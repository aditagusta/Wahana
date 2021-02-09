<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class Employee extends Model
{
   
    
    protected $table = 'employees';
    
    protected $primaryKey = 'employee_nik';

    protected $keyType = 'string';

    protected $fillable = [
        'employee_nik',
        'employee_name',
        'gender',
        'phone',
        'address',
        'id_position',
        'username',
        'password',
        'status'
    ];

     public $timestamps = false;

    public static function autentikasi($username, $password)
    {
        $result = [
            "status" => false,
            "message" => "Username atau password salah!",
            "data" => null
        ];

        // cek username
        $data = self::where("username", $username)->get();
        if(count($data) == 1)
        {
            if(Hash::check($password, $data[0]->password))
            {
                if($data[0]->status == 1)
                {
                    $result['status'] = true;
                    $result['message'] = "Anda berhasil login!";
                    $result['data'] = self::with(['position'])->where("username", $username)->first();
                    unset($result['data']->password);
                }
                else
                {
                    $result['message'] = "Akun Anda tidak aktif. Silahkan hubungi admin!";
                }
            }
        }
        return $result;
    }

    public function position()
    {
        return $this->hasOne(Position::class , 'position_id', 'id_position');
    }

    public function history_topup()
    {
        return $this->hasMany(HistoryTopup::class);
    }

     public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
     public function schedule()
    {
        return $this->hasMany(schedule::class);
    }
      public function staff_operator()
    {
        return $this->hasMany(StaffOperator::class);
    }

  



}


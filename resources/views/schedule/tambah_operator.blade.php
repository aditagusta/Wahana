<div class="row">
    @foreach ($operator as $opr)
    <div class="col-sm-2">
        <input type="checkbox" name="nama[]">&nbsp&nbsp&nbsp{{$opr->employee_name}}
    </div>
    @endforeach
</div>

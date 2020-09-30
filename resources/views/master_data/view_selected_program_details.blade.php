@foreach ($coures_collection as $val)
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="course_title">
                Course Title <span class="symbol required font"></span>
            </label>
            <input disabled value="{{$val->course_title}}" autocomplete="off" class="form-control underline" required id="course_title" placeholder="Enter Course Title" type="text" name="course_title">
            <span class="text-danger error-message here"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="short_code">
                Short Code <span class="symbol required font"></span>
            </label>
            <input disabled value="{{$val->short_code}}" autocomplete="off" class="form-control underline" required id="short_code" placeholder="Enter Short Code" type="text" name="short_code">
            <span class="text-danger error-message here"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="credit_unit">
                Credit Unit <span class="symbol required font"></span>
            </label>
            <input value="{{$val->unit}}" autocomplete="off" class="form-control underline" required id="credit_unit" placeholder="Enter Credit Unit" type="text" name="credit_unit">
            <span class="text-danger error-message here"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="category">Category</label>
            <select required autocomplete="off" class="form-control" id="category"  name="category">
                <option value="" selected>--Please Select Category--</option>
                <option {{$val->category==1?"selected":""}} value="1">Mandatory</option>
                <option {{$val->category==2?"selected":""}} value="2">Elective</option>
            </select>
        </div>
    </div>
</div>


@php
     $prog_id = $coures_collection[0]->programme_id;

     $options = '<option value = ""> Select a Year </option>';

     $duration = DB::table('tbl_programmes')->where('programme_id',$prog_id)->first()->duration;

     for ($i = 1; $i < $duration + 1; $i++)
     {
         //
        $selected = $i==$coures_collection[0]->year?" selected":"";
        $options = $options.' <option '.$selected.'  value ="'.$i.'" >'.$i.'</option>';
     }



@endphp

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="Year">
                Year <span class="symbol required font"></span>
            </label>
            <select required name="year" id="year" class="form-control underline">
                {!! $options !!} 
            </select>
            <span class="text-danger error-message here"></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="semester">
                Semester <span class="symbol required font"></span>
            </label>
            <select required name="semester" id="semester" class="form-control underline">
                <option {{$val->semester==1?"selected":""}} value="1">1</option>
                <option {{$val->semester==2?"selected":""}} value="2">2</option>
            </select>
            <span class="text-danger error-message here"></span>
        </div>
    </div>
</div>

@endforeach
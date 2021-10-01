<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  direction: rtl;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=number], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
  margin-top: 2%;}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<h2>التسجيل التسجيل بفعالية {{ $contest->title_ar }}</h2>

<div class="container">
  @include('admin.partials._error')

  <form action="{{ route('api.subscribe_actitvty') }}"  method="post" >
    @csrf

    <div class="row">
    
      <div class="col-25">
        <label for="fnamedd">البريد الإلكتروني</label>
      </div>
      <div class="col-75">
        <input type="email" id="fnamedd" value="{{ old('email') }}"  required name="email" placeholder="البريد الإلكتروني">
      </div>
      
     
    </div>
    <div class="row">
      <div >
        <input type="text" id="fname" name="constant_id" value="{{ $contest->id }}" hidden placeholder="Your name..">
      </div>
      <div class="col-25">
        <label for="fname"> الاسم الاول</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" value="{{ old('first_name') }}"  required name="first_name" placeholder="الاسم الأول">
      </div>
      
     
    </div>
     
    <div class="row">
      <div class="col-25">
        <label for="lname"> الاسم الاخير</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" value="{{ old('secand_name') }}" required name="secand_name" placeholder="الاسم الأخير">
      </div>
     
    </div>
    <div class="row">
      <div class="col-25">
        <label for="phone">  رقم الهاتف</label>
      </div>
      <div class="col-75">
        <input type="number" id="phone" value="{{ old('phone') }}"  required name="phone" placeholder="رقم الهاتف ">
      </div>
      
    </div>
 
    <div class="row">
      <div class="col-25">
        <label for="country">المدينة</label>
      </div>
      <div class="col-75">
        <select id="city_id" name="city_id">
            @foreach ($cities as $item)
                
          <option value="{{ $item->id }}">{{ $item->name_ar }}</option>
          @endforeach

        </select>
      </div>
     
    </div>

    <div class="row">
      <input type="submit" value="اشتراك">
    </div>
  </form>
</div>

</body>
</html>

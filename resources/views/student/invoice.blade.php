<!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>Enrollment</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Personal Details
               Where To Apply <br>
               Education Background <br>
               Job Detail <br>
               English Language Score <br>
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $student->name }} <br>
           <strong>Phone:</strong> {{ $student->phone }} <br>
           <strong>Email:</strong> {{ $student->email }} <br>
           <strong>Date Of Birth:</strong> {{ $student->date_of_birth }} <br>
           <strong>Address:</strong>{{ $student->address }}<br>

           <strong>Education Gap:</strong>{{ $student->education_gap }}

        </p>
    </td>
    <td>
        <p class="font">
            <h3><span style="color: green;">Guardian:</span> Details</h3>
            <strong>Guardian Name:</strong>{{ $student->guardian_name }} <br>
            <strong>Guardian Phone:</strong>{{ $student->guardian_phone }} <br>
            <strong>Guardian Email:</strong>{{ $student->guardian_email }} <br>
            <strong>Guardian Relation:</strong>{{ $student->guardian_relation }} <br>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Education Background </h3>

  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">

      <th>Degree</th>
      <th class="text-end">Subject</th>
      <th class="text-end">Result</th>
      <th class="text-end">Passing Year</th>
      <th class="text-end">Name Of Institute</th>
   </tr>
    </thead>
    <tbody>

        @foreach ($education_backgrounds as $education_background)
        <tr class="font">
           <td align="center"> {{ $education_background->degree }}</td>
          <td align="center">{{ $education_background->subject }}</td>
          <td align="center">{{ $education_background->result }}</td>
          <td align="center">{{ $education_background->passing_year }}</td>
          <td align="center">{{ $education_background->name_of_institute }}</td>

        </tr>
        @endforeach

    </tbody>
  </table>
  <h3>English Language Score</h3>
  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">

      <th>Type </th>
      <th class="text-end">Overall Score</th>
      <th class="text-end">Reading Score</th>
      <th class="text-end">Writing Score</th>
      <th class="text-end">Listening Score</th>
      <th class="text-end">Speaking Score</th>
      <th class="text-end">Expire Date</th>
   </tr>
    </thead>
    <tbody>

        @foreach ($language_scores as $language_score)
        <tr class="font">
           <td align="center"> {{ $language_score->type }}</td>
          <td align="center">{{ $language_score->overall_score }}</td>
          <td align="center">{{ $language_score->reading_score }}</td>
          <td align="center">{{ $language_score->writing_score }}</td>
          <td align="center">{{ $language_score->listening_score }}</td>
          <td align="center">{{ $language_score->speaking_score }}</td>
          <td align="center">{{ $language_score->expire_date }}</td>

        </tr        @endforeach

    </tbody>
  </table>
  <h3>Job Detail</h3>
  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">

      <th>Company </th>
      <th class="text-end">Designation</th>
      <th class="text-end">Duration</th>
      <th class="text-end">Salary Type</th>
   </tr>
    </thead>
    <tbody>

        @foreach ($job_details as $job_detail)
        <tr class="font">
           <td align="center"> {{ $job_detail->company }}</td>
          <td align="center">{{ $job_detail->designation }}</td>
          <td align="center">{{ $job_detail->duration }}</td>
          <td align="center">{{ $job_detail->salary_type }}</td>

        </tr>
        @endforeach

    </tbody>
  </table>
  <h3>Where To Apply</h3>
  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">

      <th>University </th>
      <th class="text-end">Program Level</th>
      <th class="text-end">Intake</th>
      <th class="text-end">Subject</th>
      <th class="text-end">Tution Fee</th>
      <th class="text-end">Application Fee</th>
      <th class="text-end">Country</th>
   </tr>
    </thead>
    <tbody>

        @foreach ($applies as $apply)
        <tr class="font">
           <td align="center"> {{ $apply->university }}</td>
          <td align="center">{{ $apply->program_level }}</td>
          <td align="center">{{ $apply->intake }}</td>
          <td align="center">{{ $apply->subject }}</td>
          <td align="center">{{ $apply->tution_fee }}</td>
          <td align="center">{{ $apply->application_fee }}</td>
          <td align="center">{{ $apply->country }}</td>

        </tr>
        @endforeach

    </tbody>
  </table>


  <div class="thanks mt-3">
    <p>Thanks For Downloading..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>

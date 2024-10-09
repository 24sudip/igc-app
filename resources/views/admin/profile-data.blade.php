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
          <h2 style="color: green; font-size: 26px;"><strong>IGC</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               IGC Back Office
               With Vission <br>
               And Achievements <br>
               Where Students Need <br>

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $user->name }} <br>
           <strong>Email:</strong> {{ $user->email }} <br>
           <strong>Phone:</strong> {{ $user->phone }} <br>

           <strong>Role:</strong>{{ $user->role }}

         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Designation:</span> #{{ $user->designation }}</h3>
            Register Date: {{ $user->created_at }} <br>
            Info Type : Text </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Other Information </h3>




  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">

      <th>message </th>
      <th class="text-end">professional_experience</th>
      <th class="text-end">education</th>
      <th class="text-end">research</th>
   </tr>
    </thead>
    <tbody>


      <tr class="font">
         <td align="center"> {{ $user->message }}</td>
        <td align="center">{{ $user->professional_experience }}</td>
        <td align="center">$ {{ $user->education }}</td>
        <td align="center">$ {{ $user->research }}</td>

      </tr>

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

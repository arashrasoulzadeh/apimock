<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    Current method : {{ $mock->methodLabel }}, available at <a href='{{ route( 'mock-single-api', $mock->id ) }}'>{{ route( 'mock-single-api', $mock->id ) }}</a>
    <hr>
<br>


  <table class="rounded-t-xl overflow-hidden bg-gradient-to-r from-emerald-50 to-teal-100 p-10" width="100%">
      <thead>
        <tr>
          <th>id</th>
          <th>method</th>
          <th>created</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $requests as $request )
        <tr>
          <td> <center> {{ $request[ 'id' ] }} </center></td>
          <td> <center> {{ $request[ 'method' ] }} </center></td>
          <td> <center> {{ $request[ 'created_at' ]}} </center></td>
          <td> <center> view params </center></td>
        </tr>
        @endforeach()
      </tbody>
    </table>

</div>
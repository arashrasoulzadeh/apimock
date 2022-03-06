<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    Current method : {{ $mock->methodLabel }}, available at <a href='{{ route( 'mock-single-api', $mock->id ) }}'>{{ route( 'mock-single-api', $mock->id ) }}</a>
    <hr>
<br>
   <label for="methods">method:</label> 
        <select name="methods" id="methods" wire:model="method">
          <option value="0">GET</option>
          <option value="1">POST</option>
          <option value="2">PATCH</option>
          <option value="3">DELETE</option>
        </select>
    <br><br>

    {{ $method }}
</div>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    Current method : {{ $mock->methodLabel }}, available at <a href='{{ route( 'mock-single-api', $mock->id ) }}'>{{ route( 'mock-single-api', $mock->id ) }}</a>
    <hr>
<br>


   <label for="methods">method:</label> 
        <select name="methods" id="methods" wire:model="method" >
          <option value="0">GET</option>
          <option value="1">POST</option>
          <option value="2">PATCH</option>
          <option value="3">DELETE</option>
        </select>
    <br><br>

    <textarea  cols=50 rows=10 id="template"">{{ $mock->template }}</textarea>
    <br><button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" onclick="updateTemplate()" >Update Template</button>
</div>
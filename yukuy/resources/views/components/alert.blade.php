
@if(session()->has('success'))
<div
  x-cloak
  x-show="showAlert"
  x-data="{ showAlert: true }"
  x-init="setTimeout(() => showAlert = false, 3000)"
  role="alert"
  class="bg-green-100 p-4"
>
  <p class="text-center">
    {{ session('success') }}
  </p>
</div>
@endif
@if(session()->has('error'))
<div
  x-cloak
  x-show="showAlert"
  x-data="{ showAlert: true }"
  x-init="setTimeout(() => showAlert = false, 3000)"
  role="alert"
  class="bg-green-100 p-4"
>
  <p class="text-center">
    {{ session('error') }}
  </p>
</div>
@endif
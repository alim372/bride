@if(App::getLocale() == 'ar')
  <footer class="main-footer">
    <strong>
      حقوق الملكية &copy; {{\Carbon\Carbon::now()->year}}
      <a>عروس</a>.
    </strong>
    جميع الحقوق محفوظة.
  </footer>
@else
  <footer class="main-footer">
    <strong>
      Copyright &copy; {{\Carbon\Carbon::now()->year}}
      <a>Bride</a>.
    </strong>
    All rights reserved.
  </footer>
@endif

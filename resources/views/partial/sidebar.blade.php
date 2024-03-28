  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
    @if(Auth()->user()->user_type=='admin')
    <li class="nav-item">
        <a class="nav-link " href="{{route('hr.create')}}">
          <i class="bi bi-grid"></i>
          <span>Hr Manage</span>
        </a>
      </li>    
        @endif
 
      <li class="nav-item">
        <a class="nav-link " href="{{route('appointment.create')}}">
          <i class="bi bi-grid"></i>
          <span>Schedule Manage</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{route('country.create')}}">
          <i class="bi bi-grid"></i>
          <span>Country</span>
        </a>
      </li>
    </ul>
  </aside>

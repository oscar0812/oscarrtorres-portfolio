<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-user'></i> Users</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('project') }}'><i class='nav-icon la la-keyboard'></i> Projects</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-graduation-cap"></i> CV</a>
    <ul class="nav-dropdown-items">
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('cv-section') }}'><i class='nav-icon la la-list'></i> Cv Sections</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('cv-entry') }}'><i class='nav-icon la la-pencil'></i> Cv Entries</a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('skill') }}'><i class='nav-icon la la-question'></i> Skills</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('skill-group') }}'><i class='nav-icon la la-question'></i> Skill Groups</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}\"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>

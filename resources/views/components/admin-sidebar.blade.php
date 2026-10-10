 <!-- Menu -->

 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="/admin/dashboard" class="app-brand-link">
             <span class="app-brand-text demo menu-text fw-bold ms-2">OES</span>
         </a>

         <a href="/admin/dashboard" class="layout-menu-toggle menu-link text-large ms-auto border">
             <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
         </a>
     </div>

     <div class="menu-divider mt-0"></div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
             <a href="/admin/dashboard" class="menu-link ">
                 <i class="menu-icon tf-icons bx bx-home-smile"></i>
                 <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
             </a>
         </li>

         <li class="menu-item {{ request()->is('admin/subject') ? 'active' : '' }}">
             <a href="/admin/subject" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-layout"></i>
                 <div class="text-truncate" data-i18n="Layouts">Subject</div>
             </a>
         </li>

         <li class="menu-item {{ request()->is('admin/exam') ? 'active' : '' }}">
             <a href="/admin/exam" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-layout"></i>
                 <div class="text-truncate" data-i18n="Layouts">Exams</div>
             </a>
         </li>

         <li class="menu-item {{ request()->is('admin/ques-ans') ? 'active' : '' }}">
             <a href="/admin/ques-ans" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-layout"></i>
                 <div class="text-truncate" data-i18n="Layouts">Q&A</div>
             </a>
         </li>
     </ul>
 </aside>

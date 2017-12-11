<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!--<li class="header">HEADER</li>-->
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('home') }}"><span>Accueil</span></a></li>

            <li class="treeview">
                <a href="#"><span>Sociétaires</span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('hunters') }}"><span>Afficher</span></a></li>
                    <li><a href="{{ route('addHunter') }}"><span>Ajouter</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><span>Bailleurs</span></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('lessors') }}"><span>Afficher</span></a></li>
                    <li><a href="{{ route('addLessor') }}"><span>Ajouter</span></a></li>
                </ul>
            </li>
            <li><a href="{{ route('documents') }}"><span>Documents</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

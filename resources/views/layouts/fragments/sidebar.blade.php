<?php
use Illuminate\Support\Facades\URL;
$user = Sentinel::getUser();
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            @if(isset($user) && $user->hasAnyAccess(['admin', 'data-*', 'adminsikoma']))
                <li class="header">MENU ADMINISTRATOR</li>
                @if($user->hasAnyAccess(['admin', 'data-*']))
                <li class="treeview {{ (Request::is(['informasi/*'])? 'active' : '') }}">
                    <a href="#"><i class="fa fa-archive"></i> <span>Informasi</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li {{ (Request::is(['informasi/prosedur/*', 'informasi/prosedur/index', 'informasi/prosedur'])? 'class=active' : '') }}>
                            <a href="{{ route('informasi.prosedur.index') }}"><i class="fa fa-circle-o"></i>Prosedur</a>
                        </li>
                        <li {{ (Request::is(['informasi/regulasi/*', 'informasi/regulasi/index', 'informasi/regulasi'])? 'class=active' : '') }}>
                            <a href="{{ route('informasi.regulasi.index') }}"><i class="fa fa-circle-o"></i>Regulasi</a>
                        </li>
                        <li {{ (Request::is(['informasi/potensi', 'informasi/potensi/*'])? 'class=active' : '') }}><a
                                    href="{{ route('informasi.potensi.index') }}"><i class="fa fa-circle-o"></i>Potensi</a></li>
                        <li {{ (Request::is(['informasi/event/*', 'informasi/event/index', 'informasi/event'])? 'class=active' : '') }}>
                            <a href="{{ route('informasi.event.index') }}"><i class="fa fa-circle-o"></i>Event</a></li>
                        <li {{ (Request::is(['informasi/faq/*', 'informasi/faq/index', 'informasi/faq'])? 'class=active' : '') }}>
                            <a href="{{ route('informasi.faq.index') }}"><i class="fa fa-circle-o"></i>FAQ</a></li>
                        <li {{ (Request::is(['informasi/form-dokumen/*', 'informasi/form-dokumen/index', 'informasi/form-dokumen'])? 'class=active' : '') }}>
                            <a
                                    href="{{ route('informasi.form-dokumen.index') }}"><i class="fa fa-circle-o"></i>Form
                                Dokumen</a></li>
                    </ul>
                </li>
                <li class="treeview {{ (Request::is(['data/*'])? 'active' : '') }}">
                    <a href="#"><i class="fa fa-database"></i> <span>Data</span><span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @if($user->hasAnyAccess(['admin', 'data-kecamatan']))
                        <li class="treeview {{ (Request::is(['data/profil/*', 'data/profil/index', 'data/profil','data/data-umum/*', 'data/data-umum/index', 'data/data-umum','data/data-desa/*', 'data/data-desa/index', 'data/data-desa'])? 'active' : '') }}">
                            <a href="#"><i class="fa fa-circle-o"></i>{{ $sebutan_wilayah }}
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li {{ (Request::is(['data/profil/*', 'data/profil/index', 'data/profil'])? 'class=active' : '') }}>
                                  <a href="{{ route('data.profil.index') }}"><i class="fa fa-circle-o"></i>Profil</a>
                                </li>
                                <li {{ (Request::is(['data/data-umum/*', 'data/data-umum/index', 'data/data-umum'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.data-umum.index') }}"><i class="fa fa-circle-o"></i>Data Umum</a>
                                </li>
                                <li {{ (Request::is(['data/data-desa/*', 'data/data-desa/index', 'data/data-desa'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.data-desa.index') }}"><i class="fa fa-circle-o"></i>Data Desa</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if($user->hasAnyAccess(['admin', 'data-penduduk']))
                        <li class="treeview {{ (Request::is(['data/penduduk/*', 'data/penduduk/index', 'data/penduduk', 'data/keluarga/*', 'data/keluarga/index', 'data/keluarga'])? 'active' : '') }}">
                            <a href="#"><i class="fa fa-users"></i>Kependudukan
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li {{ (Request::is(['data/penduduk/*', 'data/penduduk/index', 'data/penduduk'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.penduduk.index') }}"><i class="fa fa-circle-o"></i>Penduduk</a></li>
                                <li {{ (Request::is(['data/keluarga/*', 'data/keluarga/index', 'data/keluarga'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.keluarga.index') }}"><i class="fa fa-circle-o"></i>Keluarga</a></li>
                            </ul>
                        </li>
                        @endif

                        @if($user->hasAnyAccess(['admin', 'data-kesehatan']))
                        <li class="treeview {{ (Request::is(['data/aki-akb/*', 'data/aki-akb','data/imunisasi/*', 'data/imunisasi','data/epidemi-penyakit/*', 'data/epidemi-penyakit','data/toilet-sanitasi/*', 'data/toilet-sanitasi'])? 'active' : '') }}">
                            <a href="#"><i class="fa fa-circle-o"></i>Kesehatan
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li {{ (Request::is(['data/aki-akb/*', 'data/aki-akb'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.aki-akb.index') }}"><i class="fa fa-circle-o"></i>AKI & AKB</a>
                                </li>
                                <li {{ (Request::is(['data/imunisasi/*', 'data/imunisasi'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.imunisasi.index') }}"><i class="fa fa-circle-o"></i>Imunisasi</a>
                                </li>
                                <li {{ (Request::is(['data/epidemi-penyakit/*', 'data/epidemi-penyakit'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.epidemi-penyakit.index') }}"><i class="fa fa-circle-o"></i>Epidemi Penyakit</a>
                                </li>
                                <li {{ (Request::is(['data/toilet-sanitasi/*', 'data/toilet-sanitasi'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.toilet-sanitasi.index') }}"><i class="fa fa-circle-o"></i>Toilet & Sanitasi</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if($user->hasAnyAccess(['admin', 'data-pendidikan']))
                        <li class="treeview {{ (Request::is(['data/tingkat-pendidikan/*', 'data/tingkat-pendidikan','data/putus-sekolah/*', 'data/siswa-paud','data/fasilitas-paud/*', 'data/fasilitas-paud'])? 'active' : '') }}">
                            <a href="#"><i class="fa fa-circle-o"></i>Pendidikan
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                <li {{ (Request::is(['data/tingkat-pendidikan/*', 'data/tingkat-pendidikan'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.tingkat-pendidikan.index') }}"><i class="fa fa-circle-o"></i>Tingkat Pendidikan</a>
                                </li>
                                <li {{ (Request::is(['data/putus-sekolah/*', 'data/putus-sekolah'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.putus-sekolah.index') }}"><i class="fa fa-circle-o"></i>Siswa Putus Sekolah</a>
                                </li>
                                <li {{ (Request::is(['data/fasilitas-paud/*', 'data/fasilitas-paud'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.fasilitas-paud.index') }}"><i class="fa fa-circle-o"></i>Fasilitas PAUD</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if($user->hasAnyAccess(['admin', 'data-programbantuan']))
                        <li {{ (Request::is(['data/program-bantuan/*', 'data/program-bantuan/index', 'data/program-bantuan'])? 'class=active' : '') }}><a
                                    href="{{ route('data.program-bantuan.index') }}"><i class="fa fa-circle-o"></i>Program
                                Bantuan</a></li>
                        @endif

                        @if($user->hasAnyAccess(['admin', 'data-anggaranrealisasi', 'data-anggarandesa', 'data-laporanapbdes']))
                        <li class="treeview {{ (Request::is(['data/anggaran-realisasi/*','data/anggaran-realisasi' ,'data/anggaran-desa/*', 'data/anggaran-desa', 'data/laporan-apbdes'])? 'active' : '') }}">
                            <a href="#"><i class="fa fa-circle-o"></i>Finansial
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                            </a>
                            <ul class="treeview-menu">
                                @if($user->hasAnyAccess(['admin', 'data-anggaranrealisasi']))
                                <li {{ (Request::is(['data/anggaran-realisasi/*', 'data/anggaran-realisasi/index', 'data/anggaran-realisasi'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.anggaran-realisasi.index') }}"><i class="fa fa-circle-o"></i>Anggaran & Realisasi</a>
                                </li>
                                @endif

                                @if($user->hasAnyAccess(['admin', 'data-anggarandesa']))
                                <li {{ (Request::is(['data/anggaran-desa/*', 'data/anggaran-desa/index', 'data/anggaran-desa'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.anggaran-desa.index') }}"><i class="fa fa-circle-o"></i>APBDes</a></li>
                                @endif

                                @if($user->hasAnyAccess(['admin', 'data-apbdes']))
                                <li {{ (Request::is(['data/laporan-apbdes/*', 'data/laporan-apbdes/index', 'data/laporan-apbdes'])? 'class=active' : '') }}>
                                    <a href="{{ route('data.laporan-apbdes.index') }}"><i class="fa fa-circle-o"></i>Laporan APBDes</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if($user->hasAnyAccess(['admin', 'adminsikoma']))
                <li class="treeview {{ (Request::is(['admin-komplain/*', 'admin-komplain'])? 'active' : '') }}"><a href="#"><i class="fa fa-comments-o"></i> <span>Admin SIKEMA</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">

                        <li {{ (Request::is(['admin-komplain', 'admin-komplain/*'])? 'class=active' : '') }}><a href="{{ route('admin-komplain.index') }}"><i class="fa fa-circle-o"></i>Daftar Keluhan</a></li>
                        <li {{ (Request::is(['admin-komplain/statistik'])? 'class=active' : '') }}><a href="{{ route('admin-komplain.statistik') }}"><i class="fa fa-circle-o"></i>Statistik</a></li>

                    </ul>
                </li>
                @endif

                @if($user->hasAnyAccess(['admin', 'setting-*']))
                <li class="treeview {{ (Request::is(['setting/*'])? 'active' : '') }}"><a href="#"><i class="fa fa-cogs"></i> <span>Pengaturan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li {{ (Request::is(['setting/tipe-potensi/*', 'setting/tipe-potensi'])? 'class=active' : '') }}>
                          <a href="{{ route('setting.tipe-potensi.index') }}"><i class="fa fa-circle-o"></i>Kategori Potensi</a></li>
                        @if($user->hasAnyAccess(['admin', 'setting-kategorikomplain']))
                        <li {{ (Request::is(['setting/komplain-kategori/*', 'setting/komplain-kategori'])? 'class=active' : '') }}>
                            <a href="{{ route('setting.komplain-kategori.index') }}"><i class="fa fa-circle-o"></i>Kategori
                                Komplain</a></li>
                        @endif
                        @if($user->hasAnyAccess(['admin', 'setting-tiperegulasi']))
                        <li {{ (Request::is(['setting/tipe-regulasi/*', 'setting/tipe-regulasi'])? 'class=active' : '') }}>
                            <a href="{{ route('setting.tipe-regulasi.index') }}"><i class="fa fa-circle-o"></i>Tipe
                                Regulasi</a></li>
                        @endif
                        @if($user->hasAnyAccess(['admin', 'setting-jenispenyakit']))
                        <li {{ (Request::is(['setting/jenis-penyakit/*', 'setting/jenis-penyakit'])? 'class=active' : '') }}>
                            <a href="{{ route('setting.jenis-penyakit.index') }}"><i class="fa fa-circle-o"></i>Jenis Penyakit</a></li>
                        @endif
                        @if($user->hasAnyAccess(['admin', 'setting-slide']))
                        <li {{ (Request::is(['setting/slide/*', 'setting/slide'])? 'class=active' : '') }}>
                            <a href="{{ route('setting.slide.index') }}"><i class="fa fa-circle-o"></i>Slide</a></li>
                        @endif
                        @if($user->hasAnyAccess(['admin', 'setting-coa']))
                        <li {{ (Request::is(['setting/coa/*', 'setting/coa'])? 'class=active' : '') }}>
                            <a href="{{ route('setting.coa.index') }}"><i class="fa fa-circle-o"></i>COA</a></li>
                        @endif
                            @if($user->hasAnyAccess(['admin', 'setting-gruppengguna']))
                        <li {{ (Request::is(['setting/role/*', 'setting/role'])? 'class=active' : '') }}><a
                                    href="{{ route('setting.role.index') }}"><i class="fa fa-circle-o"></i>Grup Pengguna</a></li>
                        @endif
                        @if($user->hasAnyAccess(['admin', 'setting-pengguna']))
                        <li {{ (Request::is(['setting/user/*', 'setting/user'])? 'class=active' : '') }}><a
                                    href="{{ route('setting.user.index') }}"><i class="fa fa-circle-o"></i>Pengguna</a></li>
                        @endif
                        @if($user->hasAnyAccess(['admin', 'setting-aplikasi']))
                        <li {{ (Request::is(['setting/aplikasi/*', 'setting/aplikasi'])? 'class=active' : '') }}><a
                                    href="{{ route('setting.aplikasi.index') }}"><i class="fa fa-circle-o"></i>Aplikasi</a></li>
                        @endif
                    </ul>
                </li>
                @endif
            @endif
            <li class="header">VISITOR COUNTER</li>
            <li>
                <a href="@if(isset($user) && $user->hasAnyAccess(['admin', 'data-*', 'adminsikoma'])){{ route('counter.index') }}@else {{ '#' }} @endif" title="Jumlah Pengunjung"><i
                            class="fa fa-bullhorn"></i> <span>Total Pengunjung</span>
                            <span class="pull-right-container">
                <small class="label pull-right bg-red">{{ Counter::allVisitors() }}</small>
              </span>
                </a>

            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

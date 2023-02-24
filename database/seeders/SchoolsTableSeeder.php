<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use App\Models\Level;
use App\Models\School;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Building;
use App\Models\SchoolYear;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // step School
        $schools = [
            [
                'name' => 'Diliman Preparatory School',
                'address' => 'Commonwealth Q.C.',
                'slug' => 'diliman-preparatory-school',
                'code' => 'dps001',
                'email' => 'dps@gmail.com',
                'contact1' => '09191234561',
                'type' => 'private',
                'environment' => 'co-ed',
            ],
            [
                'name' => 'New Era University',
                'address' => 'INC QC',
                'slug' => 'new-era-university',
                'code' => 'neu002',
                'email' => 'neu@gmail.com',
                'contact1' => '09191234562',
                'type' => 'private',
                'environment' => 'co-ed',
            ],
            [
                'name' => 'Occidental Mindoro National High School',
                'address' => 'Mamburao Occi Mindoro',
                'slug' => 'occidental-mindoro-national-high-school',
                'code' => 'omnhs003',
                'email' => 'omnhs@gmail.com',
                'contact1' => '09191234563',
                'type' => 'public',
                'environment' => 'co-ed',
            ],
        ];

        foreach ($schools as $key => $value) {
            School::create($value);
        }
        /*

        $models = [
            [
                'name' => '',
                '' => '',
            ],
            [
                'name' => '',
                '' => '',
            ],
        ];

        foreach ($models as $key => $value) {
            model::create($value);
        }

        */

        // step SchoolYear
        $schoolyears = [
            [
                'name' => '2021 - 2022',
                'school_id' => '2',
            ],
            [
                'name' => '2022 - 2023',
                'school_id' => '2',
            ],        ];

        foreach ($schoolyears as $key => $value) {
            SchoolYear::create($value);
        }
        // step Users
        $users = [
            [
                'name' => 'abe baraquel',
                'email' => 'abe.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'adjemar rosete',
                'email' => 'adjemar.rosete@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'adrian rico',
                'email' => 'adrian.rico@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'adrienne mishka dy',
                'email' => 'adrienne.mishka.dy@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'aggie luque',
                'email' => 'aggie.luque@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'aida coronel dela luna',
                'email' => 'aida.coronel.dela.luna@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'aida totanes ungay',
                'email' => 'aida.totanes.ungay@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'airene chavez regudo',
                'email' => 'airene.chavez.regudo@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'ako si ynod',
                'email' => 'ako.si.ynod@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'aleynn coden',
                'email' => 'aleynn.coden@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'aliw balderas orillo',
                'email' => 'aliw.balderas.orillo@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'aljim garcia',
                'email' => 'aljim.garcia@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'allen berja',
                'email' => 'allen.berja@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'althea dhimple baraquel',
                'email' => 'althea.dhimple.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'alvin manalo',
                'email' => 'alvin.manalo@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'amy austria dempsey',
                'email' => 'amy.austria.dempsey@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'anarizza guinhawa',
                'email' => 'anarizza.guinhawa@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'andoi cortuna valbuena',
                'email' => 'andoi.cortuna.valbuena@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'angelo esguerra lacuesta',
                'email' => 'angelo.esguerra.lacuesta@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'ann gapasin',
                'email' => 'ann.gapasin@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'apple apple',
                'email' => 'apple.apple@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'april pestaño',
                'email' => 'april.pestaño@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'aries zu',
                'email' => 'aries.zu@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'arlene tena-antonio',
                'email' => 'arlene.tena-antonio@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'avigail salvio baraquel',
                'email' => 'avigail.salvio.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'baby doris',
                'email' => 'baby.doris@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'bambi guerra',
                'email' => 'bambi.guerra@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'barbie baraquel luzon',
                'email' => 'barbie.baraquel.luzon@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'bavelyn obrador alcober',
                'email' => 'bavelyn.obrador.alcober@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'behildis domingo olarte',
                'email' => 'behildis.domingo.olarte@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'bembot cortuna anueblav',
                'email' => 'bembot.cortuna.anueblav@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'beverly quilop',
                'email' => 'beverly.quilop@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'bhaby concepcion',
                'email' => 'bhaby.concepcion@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'blandie baraquel',
                'email' => 'blandie.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'blecilda custodio',
                'email' => 'blecilda.custodio@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'blends ladao vidal',
                'email' => 'blends.ladao.vidal@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'bobette odalag',
                'email' => 'bobette.odalag@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'brenda maderazo',
                'email' => 'brenda.maderazo@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cacai bunag reyes',
                'email' => 'cacai.bunag.reyes@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cajayon ng',
                'email' => 'cajayon.ng@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'catalina abrigante',
                'email' => 'catalina.abrigante@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cecilia zaparita',
                'email' => 'cecilia.zaparita@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cecille da',
                'email' => 'cecille.da@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cecille manguera',
                'email' => 'cecille.manguera@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cell panganiban del rosario',
                'email' => 'cell.panganiban.del.rosario@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'charlene sanvictores-soluren',
                'email' => 'charlene.sanvictores-soluren@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'chary ann',
                'email' => 'chary.ann@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'chell mislang',
                'email' => 'chell.mislang@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cherry ann salvio',
                'email' => 'cherry.ann.salvio@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cherry ollano natividad',
                'email' => 'cherry.ollano.natividad@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cherry villaflores',
                'email' => 'cherry.villaflores@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'chiqui ann banal magat',
                'email' => 'chiqui.ann.banal.magat@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'chrisler gonzales olarte',
                'email' => 'chrisler.gonzales.olarte@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cia lu',
                'email' => 'cia.lu@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cindy tajonera',
                'email' => 'cindy.tajonera@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'clarisse mc',
                'email' => 'clarisse.mc@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cleng esclanda llandelar',
                'email' => 'cleng.esclanda.llandelar@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'connie natividad mulingbayan-arteza',
                'email' => 'connie.natividad.mulingbayan-arteza@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'consolacion salvio',
                'email' => 'consolacion.salvio@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'criselda regis ladaga',
                'email' => 'criselda.regis.ladaga@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'crishella e. coden',
                'email' => 'crishella.e.coden@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'cristina yang delima',
                'email' => 'cristina.yang.delima@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'dandreb inot gregorio',
                'email' => 'dandreb.inot.gregorio@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'danilo salazar',
                'email' => 'danilo.salazar@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'demetrio edubas',
                'email' => 'demetrio.edubas@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'desiree rufon orgen',
                'email' => 'desiree.rufon.orgen@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'dessyryl salvio salazar',
                'email' => 'dessyryl.salvio.salazar@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'dexter bernardo ygar',
                'email' => 'dexter.bernardo.ygar@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'dhel ylagan datinguinoo',
                'email' => 'dhel.ylagan.datinguinoo@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'diether lim',
                'email' => 'diether.lim@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'divine llave melgar',
                'email' => 'divine.llave.melgar@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'donagene evangelista fineza',
                'email' => 'donagene.evangelista.fineza@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'dong flores',
                'email' => 'dong.flores@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'doy holgado magboo',
                'email' => 'doy.holgado.magboo@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'drake shayne barrera perez',
                'email' => 'drake.shayne.barrera.perez@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'drich servando',
                'email' => 'drich.servando@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'edna cardeno',
                'email' => 'edna.cardeno@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'edwin baraquel',
                'email' => 'edwin.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'efren baraquel',
                'email' => 'efren.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'eleanor m. baraquel',
                'email' => 'eleanor.m..baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'elen antipado ruado',
                'email' => 'elen.antipado.ruado@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'elsa salazar',
                'email' => 'elsa.salazar@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'emie resurreccion dimaculangan',
                'email' => 'emie.resurreccion.dimaculangan@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'emilyn gadon',
                'email' => 'emilyn.gadon@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'emmanuel abrigante',
                'email' => 'emmanuel.abrigante@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'emmanuel esguerra',
                'email' => 'emmanuel.esguerra@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'epoyjq baraquel',
                'email' => 'epoyjq.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'eric baraquel',
                'email' => 'eric.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'erlinda manalo',
                'email' => 'erlinda.manalo@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'eva baraquel',
                'email' => 'eva.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'evangeline concepcion',
                'email' => 'evangeline.concepcion@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'evangeline cruz-capanzana',
                'email' => 'evangeline.cruz-capanzana@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'eyece alulod',
                'email' => 'eyece.alulod@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'ferdie luzon',
                'email' => 'ferdie.luzon@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'fish book',
                'email' => 'fish.book@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'flor baraquel',
                'email' => 'flor.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'floramia baraquel',
                'email' => 'floramia.baraquel@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'francine louise s berja',
                'email' => 'francine.louise.s.berja@gmail.com',
                'password' => Hash::make('password'),
            ],


        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
        // step Buildings
        $buildings = [
            [
                'name' => 'Elem Bldg 1',
                'school_id' => '1',
                'floors' => '1',
            ],
            [
                'name' => 'Elem Bldg 2',
                'school_id' => '1',
                'floors' => '2',
            ],
            [
                'name' => 'Elem Bldg 1',
                'school_id' => '2',
                'floors' => '4',
            ],
            [
                'name' => 'HS Bldg 1',
                'school_id' => '2',
                'floors' => '4',
            ],
        ];

        foreach ($buildings as $key => $value) {
            Building::create($value);
        }
        // step Rooms
        $rooms = [
            [
                //fyi DPS Elem Bldg 1
                'name' => '101',
                'school_id' => '1',
                'building_id' => '1',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '102',
                'school_id' => '1',
                'building_id' => '1',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '103',
                'school_id' => '1',
                'building_id' => '1',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                //fyi DPS Elem Bldg 2 First Floor
                'name' => '101',
                'school_id' => '1',
                'building_id' => '2',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '102',
                'school_id' => '1',
                'building_id' => '2',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '103',
                'school_id' => '1',
                'building_id' => '2',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                //fyi DPS Elem Bldg 2 Second Floor
                'name' => '201',
                'school_id' => '1',
                'building_id' => '2',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '202',
                'school_id' => '1',
                'building_id' => '2',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '203',
                'school_id' => '1',
                'building_id' => '2',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                //fyi NEU Elem Bldg 1 First Floor
                'name' => '101',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '102',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '103',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '104',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                //fyi NEU Elem Bldg Second Floor
                'name' => '201',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '202',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '203',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '204',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                //fyi NEU Elem Bldg Third Floor
                'name' => '301',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '302',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '303',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '304',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                //fyi NEU Elem Bldg Fourth Floor
                'name' => '401',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '402',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '403',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                'name' => '404',
                'school_id' => '2',
                'building_id' => '3',
                'use' => 'classroom',
                'capacity' => '30',
            ],
            [
                //fyi NEU HS Bldg First Floor
                'name' => '101',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '102',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '103',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '104',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '105',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                //fyi NEU HS Bldg Second Floor
                'name' => '201',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '202',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '203',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '204',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '205',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                //fyi NEU HS Bldg Third Floor
                'name' => '301',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '302',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '303',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '304',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '305',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                //fyi NEU HS Bldg Fourth Floor
                'name' => '401',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '402',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '403',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '404',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],
            [
                'name' => '405',
                'school_id' => '2',
                'building_id' => '4',
                'use' => 'classroom',
                'capacity' => '40',
            ],

        ];

        foreach ($rooms as $key => $value) {
            Room::create($value);
        }

        // step Levels
        $levels = [
            [
                'name' => 'Grade 1'
            ],
            [
                'name' => 'Grade 2'
            ],
            [
                'name' => 'Grade 3'
            ],
            [
                'name' => 'Grade 4'
            ],
            [
                'name' => 'Grade 5'
            ],
            [
                'name' => 'Grade 6'
            ],
            [
                'name' => 'Grade 7'
            ],
            [
                'name' => 'Grade 8'
            ],
            [
                'name' => 'Grade 9'
            ],
            [
                'name' => 'Grade 10'
            ],
            [
                'name' => 'Grade 11'
            ],
            [
                'name' => 'Grade 12'
            ],
            [
                'name' => 'Nursery'
            ],
            [
                'name' => 'Kinder'
            ],
        ];

        foreach($levels as $key => $value) {
            Level::create($value);
        }

        //step Subject

        $subjects = [
            [
                'name' => 'Mother Tongue',
                'short_name' => 'Mother Tongue',
            ],
            [
                'name' => 'Filipino',
                'short_name' => 'Filipino',
            ],
            [
                'name' => 'English',
                'short_name' => 'English',
            ],
            [
                'name' => 'Mathematics',
                'short_name' => 'Math',
            ],
            [
                'name' => 'Science',
                'short_name' => 'Science',
            ],
            [
                'name' => 'Araling Panlipunan',
                'short_name' => 'A.P.',
            ],
            [
                'name' => 'Edukasyon sa Pagpapakatao',
                'short_name' => 'EsP',
            ],
            [
                'name' => 'Music',
                'short_name' => 'Music',
            ],
            [
                'name' => 'Arts',
                'short_name' => 'Arts',
            ],
            [
                'name' => 'Physical Education',
                'short_name' => 'P.E.',
            ],
            [
                'name' => 'Health',
                'short_name' => 'Health',
            ],
            [
                'name' => 'Edukasyong Pantahanan at Pangkabuhayan',
                'short_name' => 'EPP',
            ],
            [
                'name' => 'Technology and Livelihood Education',
                'short_name' => 'TLE',
            ],
        ];

        foreach ($subjects as $key => $value) {
            Subject::create($value);
        }
    }
}

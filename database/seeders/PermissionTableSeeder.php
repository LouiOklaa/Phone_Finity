<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'Armaturenbrett',
            'Statistiken',

            'AllgemeineInformationen',
            'AllgemeineInformationenBearbeiten',

            'Handys',
            'Geräte',
            'GerätHinzufügen',
            'GerätBearbeiten',
            'GerätLöschen',
            'GeräteKategorien',
            'GeräteKategorienHinzufügen',
            'GeräteKategorienBearbeiten',
            'GeräteKategorienLöschen',

            'Zubehör',
            'HandysZubehör',
            'HandysZubehörHinzufügen',
            'HandysZubehörBearbeiten',
            'HandysZubehörLöschen',
            'ZubehörKategorien',
            'ZubehörKategorienHinzufügen',
            'ZubehörKategorienBearbeiten',
            'ZubehörKategorienLöschen',

            'Dienstleistungen',
            'HandysDienste',
            'HandysDiensteHinzufügen',
            'HandysDiensteBearbeiten',
            'HandysDiensteLöschen',
            'DiensteKategorien',
            'DienstKategorienHinzufügen',
            'DienstKategorienBearbeite',
            'DienstKategorienLöschen',

            'Galerie',
            'InGalerieHinzufügen',
            'InGalerieBearbeiten',
            'InGalerieLöschen',

            'AlleNachrichtenAnzeigen',
            'Nachricht',
            'NachrichtSenden',

            'Einstellungen',
            'Benutzer',
            'BenutzerHinzufügen',
            'BenutzerBearbeiten',
            'BenutzerLöschen',
            'ProfilAnzeigen',
            'AlleProfileAnzeigen',
            'BenutzerRollen',
            'RollenHinzufügen',
            'RollenBearbeiten',
            'RollenLöschen',
            'RollenAnzeigen',
            'AlleRollenAnzeigen',

            'ExportExcel',

            'Dokumentation',

        ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}

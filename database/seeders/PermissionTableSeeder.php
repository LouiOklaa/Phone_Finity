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
            'AllgemeineInformationen',
            'Handys',
            'Zubehör',
            'Dienstleistungen',
            'Galerie',
            'Einstellungen',
            'Dokumentation',

            'Statistiken',

            'AllgemeineInformationenBearbeiten',

            'Geräte',
            'GerätHinzufügen',
            'GerätBearbeiten',
            'GerätLöschen',
            'GeräteAbschnitt',
            'GeräteAbschnittHinzufügen',
            'GeräteAbschnittBearbeiten',
            'GeräteAbschnittLöschen',

            'HandysZubehör',
            'HandysZubehörHinzufügen',
            'HandysZubehörBearbeiten',
            'HandysZubehörLöschen',
            'ZubehörAbschnitte',
            'ZubehörAbschnitteHinzufügen',
            'ZubehörAbschnitteBearbeiten',
            'ZubehörAbschnitteLöschen',

            'HandysDienste',
            'HandysDiensteHinzufügen',
            'HandysDiensteBearbeiten',
            'HandysDiensteLöschen',
            'DienstAbschnitte',
            'DienstAbschnitteHinzufügen',
            'DienstAbschnitteBearbeite',
            'DienstAbschnitteLöschen',

            'InGalerieHinzufügen',
            'InGalerieBearbeiten',
            'InGalerieLöschen',

            'Benutzer',
            'BenutzerHinzufügen',
            'BenutzerBearbeiten',
            'BenutzerLöschen',

            'BenutzerRollen',
            'RollenHinzufügen',
            'RollenBearbeiten',
            'RollenLöschen',
            'RollenAnzeigen',

        ];


        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}

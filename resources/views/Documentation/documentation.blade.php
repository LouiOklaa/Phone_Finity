@extends('layouts.master')
@section('CSS')
    <style>

        .title {
            color: #888888;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .text {
            color: #666666;
            font-size: 0.95rem;
            line-height: 1.1;
            margin-bottom: 20px;
        }

    </style>
@endsection
@section('title')
    Dokumentation
@endsection
@section('contents')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <ul style="color: #00c292" class="list-inline text-center">
                                <li class="list-inline-item">D</li>
                                <li class="list-inline-item">O</li>
                                <li class="list-inline-item">K</li>
                                <li class="list-inline-item">U</li>
                                <li class="list-inline-item">M</li>
                                <li class="list-inline-item">E</li>
                                <li class="list-inline-item">N</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">A</li>
                                <li class="list-inline-item">T</li>
                                <li class="list-inline-item">I</li>
                                <li class="list-inline-item">O</li>
                                <li class="list-inline-item">N</li>
                            </ul>
                            <br>
                            <h5 class="title">Startseite</h5>
                            <ul>
                                <li class="text">Perfektes Erlebnis für einen Handy Webseite zur professionellen
                                    Darstellung von Produkten und Dienstleistungen.
                                </li>
                                <li class="text">Entwickelt mit HTML5, um modernste technische Standards zu
                                    gewährleisten.
                                </li>
                                <li class="text">Responsives Design für alle Gerätegrößen, das die beste Nutzererfahrung
                                    garantiert.
                                </li>
                            </ul>

                            <h5 class="title">Dashboard</h5>
                            <ul>
                                <li class="text">Darstellung von Handyverkäufen und deren Anteile mit detaillierten
                                    Statistiken zu Handys, Zubehör, Dienstleistungen und eingehenden Nachrichten.
                                </li>
                                <li class="text">Umfassende Berichte zur Verbesserung der Website-Leistung.</li>
                            </ul>

                            <h5 class="title">Allgemeine Informationen</h5>
                            <ul>
                                <li class="text">Bearbeitung der grundlegenden Website-Daten wie Telefonnummern, E-Mails
                                    und Standort.
                                </li>
                                <li class="text">Einfache Schnittstelle zur schnellen Aktualisierung.</li>
                            </ul>

                            <h5 class="title">Handysseite</h5>
                            <ul>
                                <li class="text">Vollständige Verwaltung der Handys (Hinzufügen, Bearbeiten, Löschen)
                                    mit der Möglichkeit, die Daten als Excel-Datei zu exportieren.
                                </li>
                                <li class="text">Fortschrittliche Benutzeroberfläche mit dynamischen Tabellen
                                    (DataTables), um eine einfache Organisation und Verwaltung der Handydaten zu
                                    gewährleisten.
                                </li>
                            </ul>

                            <h5 class="title">Zubehörseite</h5>
                            <ul>
                                <li class="text">Speziell entwickelter Bereich zur Verwaltung aller Zubehörprodukte
                                    (Hinzufügen, Bearbeiten, Löschen).
                                </li>
                                <li class="text">Optimierte Tabellenansichten mit Exportfunktion nach Excel, um die
                                    Arbeit der Benutzer zu erleichtern.
                                </li>
                            </ul>

                            <h5 class="title">Dienstleistungsseite</h5>
                            <ul>
                                <li class="text">Plattform zur vollständigen Verwaltung von Dienstleistungen (z.B.
                                    Reparatur oder spezielle Angebote).
                                </li>
                                <li class="text">Intuitive Benutzeroberfläche, die die einfache Bearbeitung von
                                    Dienstleistungen ermöglicht und den Export nach Excel unterstützt.
                                </li>
                            </ul>

                            <h5 class="title">Galerie</h5>
                            <ul>
                                <li class="text">Hinzufügen, Bearbeiten und Löschen von Projekten in der Galerie des
                                    Unternehmens.
                                </li>
                                <li class="text">Möglichkeit, neue und abgeschlossene Projekte hinzuzufügen, um das
                                    Vertrauen der Benutzer zu stärken und die Interaktion zu fördern.
                                </li>
                            </ul>

                            <h5 class="title">Berichteseite</h5>
                            <ul>
                                <li class="text">Umfassende Berichte zu allen vorhandenen Handys mit der Möglichkeit,
                                    Berichte als Excel-Datei zu exportieren.
                                </li>
                                <li class="text">Erweiterte Suchoptionen nach Datum oder Name für eine einfache
                                    Berichtverwaltung.
                                </li>
                                <li class="text">Ähnliche Berichte für Zubehör mit denselben Funktionen, die speziell
                                    auf die Anforderungen der Zubehörverwaltung zugeschnitten sind.
                                </li>
                            </ul>

                            <h5 class="title">Nachrichtenseite</h5>
                            <ul>
                                <li class="text">Empfang von E-Mails und Benutzeranfragen mit der Möglichkeit, direkt zu
                                    antworten.
                                </li>
                                <li class="text">Funktionen wie "als gelesen markieren" und Benachrichtigungen für
                                    Administratoren.
                                </li>
                                <li class="text">Live-Chat-System für sofortige Interaktion.</li>
                            </ul>

                            <h5 class="title">Einstellungen</h5>
                            <ul>
                                <li class="text">Benutzerverwaltung: Hinzufügen, Löschen und Bearbeiten von
                                    Benutzerprofilen.
                                </li>
                                <li class="text">Erweiterte Rollenzuweisung für Benutzer basierend auf ihren
                                    Verantwortlichkeiten.
                                </li>
                            </ul>

                            <h5 class="title">Rollen und Berechtigungen</h5>
                            <ul>
                                <li class="text">Detaillierte Einstellung der Berechtigungen pro Benutzer.</li>
                                <li class="text">Möglichkeit, den Zugriff auf die gesamte Website oder nur auf bestimmte
                                    Abschnitte zu gewähren.
                                </li>
                            </ul>

                            <h5 class="title">Zusätzliche Funktionen</h5>
                            <ul>
                                <li class="text">Nahtlose Integration mit Datenbanken für fortschrittliches
                                    Datenmanagement.
                                </li>
                                <li class="text">Benachrichtigungssystem, das sicherstellt, dass Benutzer auf dem
                                    Laufenden bleiben.
                                </li>
                                <li class="text">Hohe Leistung, die großen Datenverkehr bewältigen kann.</li>
                            </ul>

                            <h5 class="title">Urheberrecht</h5>
                            <ul>
                                <li class="text">Alle Rechte vorbehalten für Loui Oklaa, der Entwickler und Ersteller
                                    des Projekts.
                                </li>
                                <li class="text">Das Projekt basiert auf Laravel 10 und PHP 8.3 für optimale Leistung
                                    und Qualität.
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

@endsection

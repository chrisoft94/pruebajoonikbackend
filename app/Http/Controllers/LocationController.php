<?php

namespace App\Http\Controllers;

class LocationController extends Controller
{
    /**
     * Retorna la lista de sedes (locations).
     */
    public function index()
    {
        $locations = [
            [
                'code' => 1,
                'name' => 'Sede Principal',
                'image' => 'https://promoversas.com.co/images2/sedes/sedes-promover-sas.png',
                'creationDate' => '2023-01-01',
            ],
            [
                'code' => 2,
                'name' => 'Sede Norte',
                'image' => 'https://www.univalle.edu.co/media/k2/items/cache/0273437318a610d4316228b2a7cbfdc0_M.jpg',
                'creationDate' => '2023-03-15',
            ],
            [
                'code' => 3,
                'name' => 'Sede Sur',
                'image' => 'https://www.ecci.edu.co/wp-content/uploads/2024/01/Sedesur-scaled.jpg',
                'creationDate' => '2023-04-10',
            ],
            [
                'code' => 4,
                'name' => 'Sede Oeste',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL08XWRQCXNWKm1iLgMMBBlaSb6VsmoLMUA&s',
                'creationDate' => '2023-05-21',
            ],
            [
                'code' => 5,
                'name' => 'Sede Este',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTKa1Q7LNApERbdVlCGNWhDZso_vRZpr1Y2g&s',
                'creationDate' => '2023-07-30',
            ],
            [
                'code' => 6,
                'name' => 'Sede Internacional',
                'image' => 'https://alpina.com/media/wysiwyg/sedes-images-mb-01.png',
                'creationDate' => '2023-09-12',
            ],
            [
                'code' => 7,
                'name' => 'Sede Bogotá',
                'image' => 'https://www.ugc.edu.co/bogota/templates/yootheme/cache/bc/sede-armenia-bc953e23.jpeg',
                'creationDate' => '2023-11-05',
            ],
            [
                'code' => 8,
                'name' => 'Sede Medellín',
                'image' => 'https://montalvoinstitute.co/wp-content/uploads/2024/08/Sede-Bogota-1.png',
                'creationDate' => '2023-10-09',
            ],
            [
                'code' => 9,
                'name' => 'Sede Principal',
                'image' => 'https://promoversas.com.co/images2/sedes/sedes-promover-sas.png',
                'creationDate' => '2023-01-01',
            ],
        ];

        return response()->json($locations);
    }
}

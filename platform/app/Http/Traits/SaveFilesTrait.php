<?php
namespace App\Http\Traits;
use Illuminate\Support\Str;


trait SaveFilesTrait {
        //Funciones Para Guardar Imagenes
        public function saveTourImg($tour)
        {
            // se obtienen los archivos enviador en $tour
            $file_portada = $tour->file('img_portada');
            $file_banner = $tour->file('img_banner');
            $file_pdf = $tour->file('pdf');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $portada_name = Str::slug($tour->nombre_es);
            $portada_ext = $file_portada->guessExtension();

            $banner_name = preg_replace('/[^a-z0-9-_\-\.]/i', '_', $tour->nombre_es);;
            $banner_ext = $file_banner->guessExtension();

            $pdf_name = Str::slug($tour->nombre_es);
            $pdf_ext = $file_pdf->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_portada = public_path('img/tours/');
            $ruta_banner = public_path('img/banners/');
            $ruta_pdf = public_path('pdf/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_portada . $portada_name . '.' . $portada_ext)
                || file_exists($ruta_banner . $banner_name . '.' . $banner_ext)
                || file_exists($ruta_pdf . $pdf_name . '.' . $pdf_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_portada . $portada_name . '_' . $counter . '.' . $portada_ext)
                    || @file_exists($ruta_banner . $banner_name . '_' . $counter . '.' . $banner_ext)
                    || @file_exists($ruta_pdf . $pdf_name . '_' . $counter . '.' . $pdf_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img_portada = $portada_name . '_' . $counter . '.' . $portada_ext;
                $img_banner = $banner_name . '_' . $counter . '.' . $banner_ext;
                $pdf = $pdf_name . '_' . $counter . '.' . $pdf_ext;
            } else {
                $img_portada = $portada_name . '.' . $portada_ext;
                $img_banner = $banner_name . '.' . $banner_ext;
                $pdf = $pdf_name . '.' . $pdf_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_portada = $ruta_portada . $img_portada;
            $path_banner = $ruta_banner . $img_banner;
            $path_pdf = $ruta_pdf . $pdf;

            //se crean archivos del path temporal a la ruta definida
            $file_portada->move($ruta_portada, $path_portada);
            $file_banner->move($ruta_banner, $path_banner);
            $file_pdf->move($ruta_pdf, $path_pdf);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['img_portada' => $img_portada, 'img_banner' => $img_banner, 'pdf' => $pdf];
        }

        public function saveImage($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('img');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/images/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['img' => $img];
        }



        //Guardar Imagenes de Hoteles
        public function saveImageHotel($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('imagen');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/hoteles/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['imagen' => $img];
        }

        public function saveHotelHabitacionImage($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('imagen');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/hoteles/habitaciones/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['imagen' => $img];
        }

        //Guardar Imagenes de Cabanas
        public function saveImageCabana($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('imagen');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/cabanas/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['imagen' => $img];
        }

        public function saveCabanaHabitacionPortadaImage($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('imagen');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/cabanas/habitaciones/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['imagen' => $img];
        }

        public function saveCabanaHabitacionImage($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('imagen');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/cabanas/habitaciones/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['imagen' => $img];
        }

        public function saveAtraccionImage($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('imagen');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/atracciones/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['imagen' => $img];
        }

        public function saveServicioImage($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('imagen');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/servicios/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['imagen' => $img];
        }

        public function savePaqueteImage($image)
        {
            // se obtienen los archivos enviador en $tour
            $file_image = $image->file('imagen');

            //se genera un nombre para cada archivo y se obtiene la extension de los archivos
            $image_name = Str::slug($image->nombre);
            $image_ext = $file_image->guessExtension();

            //se genera una ruta en donde se guardara el archivo
            $ruta_image = public_path('img/paquetes/');

            //se valida si el archivo ya existe
            if (
                file_exists($ruta_image . $image_name . '.' . $image_ext)
            ) {
                //si existe el counter se define en 1
                $counter = 1;
                //mientras el archivo siga existiendo, se aumenta el counter y se agrega al nombre del archivo
                while (
                    @file_exists($ruta_image . $image_name . '_' . $counter . '.' . $image_ext)
                ) {
                    $counter++;
                }
                // Si existe se renombra a con un infijo numérico: carta_a_los_reyes_magos_2.txt
                $img = $image_name . '_' . $counter . '.' . $image_ext;
            } else {
                $img = $image_name . '.' . $image_ext;
            }

            //se genera la ruta con el nombre del archivo ya definido
            $path_image = $ruta_image . $img;

            //se crean archivos del path temporal a la ruta definida
            $file_image->move($ruta_image, $path_image);

            //se regresa un array con el nombre de los archivos generados para acceder a ellos desde el metodo
            //para guardarlos en la base de datos
            return ['imagen' => $img];
        }
}

<div class="container mb-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center fs-5 text-muted mb-2"><?= $data['story']['category'] ?></div>
            <h1 class="text-center fs-3"><?= $data['story']['title'] ?></h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 col-lg-8">
            <?php
            $content = [];
            $size = [];
            $row = 1;
            $currentSize = 0;
            array_push($data['images'], []);

            foreach ($data['images'] as $key => $value) {
                if ($value['desc'] != '' || $key == (sizeof($data['images']) - 1)) {
                    if ($row == 1) {
                        $content[$row] = str_replace('col-md-8', 'col-12', $content[$row]);
                        $content[$row] = str_replace('col-md-4', 'col-12', $content[$row]);
                        $content[$row] = str_replace('ratio-landscape', 'ratio-16x9', $content[$row]);
                        $row++;
                    } else {
                        if ($size[$row] == 4) {
                            if ($size[$row - 1] == 12) {
                                $content[$row - 1] .= $content[$row];
                                $content[$row - 1] = str_replace('col-md-8', 'col-md-6', $content[$row - 1]);
                                $content[$row - 1] = str_replace('col-md-4', 'col-md-3', $content[$row - 1]);
                            } else if ($size[$row - 1] == 13) {
                                $content[$row - 1] .= $content[$row];
                                $content[$row - 1] = str_replace('col-md-4', 'col-md-6', $content[$row - 1]);
                            } else if ($size[$row - 1] == 16) {
                                $pos = strpos($content[$row - 1], 'col-md-6');
                                if ($pos !== false) {
                                    $content[$row - 1] = substr_replace($content[$row - 1], 'col-12', $pos, strlen('col-md-6'));
                                }
                                $pos = strpos($content[$row - 1], 'ratio-landscape');
                                if ($pos !== false) {
                                    $content[$row - 1] = substr_replace($content[$row - 1], 'ratio-16x9', $pos, strlen('ratio-landscape'));
                                }
                                $content[$row - 1] .= $content[$row];
                            }
                        } else if ($size[$row] == 8) {
                            if ($size[$row - 1] == 8) {
                                $content[$row - 1] .= $content[$row];
                                $content[$row - 1] = str_replace('col-md-8', 'col-md-6', $content[$row - 1]);
                            } else if ($size[$row - 1] == 12 || $size[$row - 1] == 16) {
                                $content[$row - 1] .= str_replace('col-md-8', 'col-md-12', $content[$row]);
                                $content[$row - 1] = str_replace('ratio-landscape', 'ratio-16x9', $content[$row - 1]);
                            } else if ($size[$row - 1] == 13) {
                                $pos = strpos($content[$row - 1], 'col-md-4');
                                if ($pos !== false) {
                                    $content[$row - 1] = substr_replace($content[$row - 1], 'col-md-6', $pos, strlen('col-md-4'));
                                }
                                $pos = strpos($content[$row - 1], 'col-md-4');
                                if ($pos !== false) {
                                    $content[$row - 1] = substr_replace($content[$row - 1], 'col-md-6', $pos, strlen('col-md-4'));
                                }
                                $content[$row - 1] .= $content[$row];
                            }
                        }
                    }
                    if ($key != (sizeof($data['images']) - 1)) {
                        $content[$row] = '<div class="col-12 my-5 py-5">';
                        $content[$row] .= '<div class="row justify-content-center">';
                        if ($value['desc_position'] == 1) {
                            $content[$row] .= '<div class="col-12 text-justify align-self-center"><div class="py-3" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '">' . $value['desc'] . '</div></div>';
                        } else if ($value['desc_position'] == 4) {
                            $content[$row] .= '<div class="col text-justify align-self-center"><div class="py-3" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '">' . $value['desc'] . '</div></div>';
                        }
                        if ($value['orientation'] == 0) {
                            $content[$row] .= '<div class="align-self-center ' . ($value['desc_position'] == 2 || $value['desc_position'] == 4 ? 'col-md-4' : 'col-12') . '"><div class="position-relative" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '"><div class="photo-preview overflow-hidden shadow ratio ratio-portrait"><div class="position-absolute blur-load" style="background-image: url(' . THUMBURL . $value['picture'] . ');"></div><img data-src="' . IMGURL . $value['picture'] . '" class="object-fit-cover img-thumb w-100 h-100 transition" style="opacity: 0;" loading="lazy"></div></div></div>';
                        } else {
                            $content[$row] .= '<div class="align-self-center ' . ($value['desc_position'] == 2 || $value['desc_position'] == 4 ? 'col-md-6' : 'col-12') . '"><div class="position-relative" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '"><div class="photo-preview overflow-hidden shadow ratio ' . ($value['desc_position'] == 2 || $value['desc_position'] == 4 ? 'ratio-portrait' : 'ratio-16x9') . '">    <div class="position-absolute blur-load" style="background-image: url(' . THUMBURL . $value['picture'] . ');"></div><img data-src="' . IMGURL . $value['picture'] . '" class="object-fit-cover img-thumb w-100 h-100 transition" style="opacity: 0;" loading="lazy"></div></div></div>';
                        }
                        if ($value['desc_position'] == 2) {
                            $content[$row] .= '<div class="col text-justify align-self-center"><div class="py-3" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '">' . $value['desc'] . '</div></div>';
                        } else if ($value['desc_position'] == 3) {
                            $content[$row] .= '<div class="col-12 text-justify align-self-center"><div class="py-3" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '">' . $value['desc'] . '</div></div>';
                        }
                        $content[$row] .= '</div>';
                        $content[$row] .= '</div>';
                        $row++;
                    } else {
                        $content[$row] = '';
                    }
                } else {
                    if ($value['orientation'] == 0) {
                        $size[$row] += 4;
                        $currentSize = 4;
                        $content[$row] .= '<div class="col-md-4"><div class="position-relative" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '"><div class="photo-preview overflow-hidden shadow ratio ratio-portrait"><div class="position-absolute blur-load" style="background-image: url(' . THUMBURL . $value['picture'] . ');"></div><img data-src="' . IMGURL . $value['picture'] . '" class="object-fit-cover img-thumb w-100 h-100 transition" style="opacity: 0;" loading="lazy"></div></div></div>';
                    } else {
                        $size[$row] += 8;
                        $currentSize = 8;
                        $content[$row] .= '<div class="col-md-8"><div class="position-relative" data-aos="fade-up" data-aos-offset="' . rand(0, 200) . '"><div class="photo-preview overflow-hidden shadow ratio ratio-landscape"><div class="position-absolute blur-load" style="background-image: url(' . THUMBURL . $value['picture'] . ');"></div><img data-src="' . IMGURL . $value['picture'] . '" class="object-fit-cover img-thumb w-100 h-100 transition" style="opacity: 0;" loading="lazy"></div></div></div>';
                    }
                }
                if ($size[$row] == 8 && $size[$row] - $currentSize == 4) {
                    if ($data['images'][$key + 1]['orientation'] == 1 || $data['images'][$key + 1]['desc'] != '' || $key + 1 == sizeof($data['images']) - 1) {
                        $content[$row] = str_replace('col-md-4', 'col-md-6', $content[$row]);
                        $row++;
                    } else {
                        $size[$row] += 1;
                    }
                } else if ($size[$row] == 12 || $size['row'] == 13) {
                    $row++;
                } else if ($size[$row] == 16) {
                    $content[$row] = str_replace('col-md-8', 'col-md-6', $content[$row]);
                    $row++;
                }
            }
            echo '<div class="row justify-content-center g-3 mb-3">';
            for ($i = 0; $i <= $row; $i++) {
                echo $content[$i];
            }
            echo '</div>';
            ?>
        </div>
    </div>
</div>
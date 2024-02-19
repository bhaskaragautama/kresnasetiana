<div class="hstack justify-content-between mb-4">
    <h2 class="fw-semibold mb-0">Story</h2>
    <a href="<?= BASEURL ?>story/form" class="btn btn-primary">New Story</a>
</div>
<div class="row">
    <div class="table-responsive p-0">
        <table id="story-table" class="table table-hovered">
            <thead>
                <tr>
                    <th class="text-nowrap">Num</th>
                    <th class="text-nowrap">Series</th>
                    <th class="text-nowrap">Title</th>
                    <th class="text-nowrap">Contain Best</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data as $key => $value) {
                    echo '<tr class="align-middle">';
                    echo '<td class="text-nowrap">' . $i . '</td>';
                    echo '<td class="text-nowrap">' . $value['category'] . '</td>';
                    echo '<td class="text-nowrap"><a href="#" class="story-detail" data-id="' . $value['id'] . '">' . $value['title'] . '</a></td>';
                    echo '<td class="text-nowrap">' . ($value['best'] > 0 ? '<i class="bi bi-check-lg text-success"></i>' : '<i class="bi bi-x-lg text-danger"></i>') . '</td>';
                    echo '<td class="text-nowrap">
                        <a href="' . BASEURL . 'story/form/' . $value['id'] . '" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-delete="' . BASEURL . 'story/delete/' . $value['id'] . '" title="Delete"><i class="bi bi-trash"></i> Delete</button>
                    </td>';
                    echo '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detail-modal" tabindex="-1" aria-labelledby="detail-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detail-modalLabel">Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                <div id="detail-series" class="text-secondary fw-semibold small"></div>
                <div id="detail-title" class="fw-semibold fs-4 mb-3"></div>
                <div id="detail-collage" class="row justify-content-center g-3 mb-3"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#story-table').DataTable({
            'columns': [{
                    'searchable': false
                },
                null,
                null,
                {
                    'searchable': false
                },
                {
                    'searchable': false,
                    'orderable': false
                }
            ]
        });
        $('#story-table').on('click', '.story-detail', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= BASEURL ?>story/getdetail/" + $(this).data('id'),
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $('#detail-collage').html('');
                    $('#detail-series').html(response.detail.category);
                    $('#detail-title').html(response.detail.title);


                    let content = [];
                    let size = [];
                    let row = 1;
                    let currentSize = 0;
                    response.images.push([]);
                    size[row] = 0;
                    content[row] = '';
                    console.log(response.images);
                    $.each(response.images, function(idx, val) {
                        if ((val.desc != '' && val.desc != null) || idx == response.images.length - 1) {
                            if (row == 1) {
                                content[row] = content[row].replaceAll('col-md-8', 'col-12');
                                content[row] = content[row].replaceAll('col-md-4', 'col-12');
                                content[row] = content[row].replaceAll('ratio-landscape', 'ratio-16x9');
                                row++;
                                size[row] = 0;
                                content[row] = '';
                            } else {
                                if (size[row] == 4) {
                                    if (size[row - 1] == 12) {
                                        content[row - 1] += content[row];
                                        content[row - 1] = content[row - 1].replaceAll('col-md-8', 'col-md-6');
                                        content[row - 1] = content[row - 1].replaceAll('col-md-4', 'col-md-3');
                                    } else if (size[row - 1] == 13) {
                                        content[row - 1] += content[row];
                                        content[row - 1] = content[row - 1].replaceAll('col-md-4', 'col-md-6');
                                    } else if (size[row - 1] == 16) {
                                        content[row - 1] = content[row - 1].replace('col-md-6', 'col-12');
                                        content[row - 1] = content[row - 1].replace('ratio-landscape', 'ratio-16x9');
                                        content[row - 1] += content[row];
                                    }
                                } else if (size[row] == 8) {
                                    if (size[row - 1] == 8) {
                                        content[row - 1] += content[row];
                                        content[row - 1] = content[row - 1].replaceAll('col-md-8', 'col-md-6');
                                    } else if (size[row - 1] == 12 || size[row - 1] == 16) {
                                        content[row - 1] += content[row].replaceAll('col-md-8', 'col-md-12');
                                        content[row - 1] = content[row - 1].replaceAll('ratio-landscape', 'ratio-16x9');
                                    } else if (size[row - 1] == 13) {
                                        content[row - 1] = content[row - 1].replace('col-md-4', 'col-md-6');
                                        content[row - 1] = content[row - 1].replace('col-md-4', 'col-md-6');
                                        content[row - 1] += content[row];
                                    }
                                }
                            }
                            if (idx != response.images.length - 1) {
                                content[row] = '<div class="col-12 my-5 py-5">';
                                content[row] += '<div class="row justify-content-center">';
                                if (val.desc_position == 1) {
                                    content[row] += `<div class="col-12 text-justify align-self-center small"><div class="py-3">${val.desc}</div></div>`;
                                } else if (val.desc_position == 4) {
                                    content[row] += `<div class="col text-justify align-self-center small"><div class="py-3">${val.desc}</div></div>`;
                                }
                                if (val.orientation == 0) {
                                    content[row] += `<div class="align-self-center ${val.desc_position == 2 || val.desc_position == 4 ? 'col-md-4' : 'col-12'}"><div class="position-relative"><div class="ratio ratio-portrait"><img src="<?= IMGURL ?>${val.picture}" class="object-fit-cover shadow-sm rounded-2"></div>${val.is_best == 1 ? '<div class="position-absolute top-0 end-0"><div class="px-2 py-1 m-2 bg-success rounded-1 shadow" title="Best"><i class="bi bi-hand-thumbs-up text-white"></i></div></div>' : ''}</div></div>`;
                                } else {
                                    content[row] += `<div class="align-self-center ${val.desc_position == 2 || val.desc_position == 4 ? 'col-md-6' : 'col-12'}"><div class="position-relative"><div class="ratio ${val.desc_position == 2 || val.desc_position == 4 ? 'ratio-portrait' : 'ratio-16x9'}"><img src="<?= IMGURL ?>${val.picture}" class="object-fit-cover shadow-sm rounded-2"></div>${val.is_best == 1 ? '<div class="position-absolute top-0 end-0"><div class="px-2 py-1 m-2 bg-success rounded-1 shadow" title="Best"><i class="bi bi-hand-thumbs-up text-white"></i></div></div>' : ''}</div></div>`;
                                }
                                if (val.desc_position == 2) {
                                    content[row] += `<div class="col text-justify align-self-center small"><div class="py-3">${val.desc}</div></div>`;
                                } else if (val.desc_position == 3) {
                                    content[row] += `<div class="col-12 text-justify align-self-center small"><div class="py-3">${val.desc}</div></div>`;
                                }
                                content[row] += '</div>';
                                content[row] += '</div>';
                                row++;
                                size[row] = 0;
                                content[row] = '';
                            } else {
                                content[row] = '';
                            }
                        } else {
                            if (val.orientation == 0) {
                                size[row] += 4;
                                currentSize = 4;
                                content[row] += `<div class="col-md-4"><div class="position-relative"><div class="ratio ratio-portrait"><img src="<?= IMGURL ?>${val.picture}" class="object-fit-cover shadow-sm rounded-2"></div>${val.is_best == 1 ? '<div class="position-absolute top-0 end-0"><div class="px-2 py-1 m-2 bg-success rounded-1 shadow" title="Best"><i class="bi bi-hand-thumbs-up text-white"></i></div></div>' : ''}</div></div>`;
                            } else {
                                size[row] += 8;
                                currentSize = 8;
                                content[row] += `<div class="col-md-8"><div class="position-relative"><div class="ratio ratio-landscape"><img src="<?= IMGURL ?>${val.picture}" class="object-fit-cover shadow-sm rounded-2"></div>${val.is_best == 1 ? '<div class="position-absolute top-0 end-0"><div class="px-2 py-1 m-2 bg-success rounded-1 shadow" title="Best"><i class="bi bi-hand-thumbs-up text-white"></i></div></div>' : ''}</div></div>`;
                            }
                        }
                        console.log(content[row]);
                        if (size[row] == 8 && size[row] - currentSize == 4) {
                            if (response.images[idx - 1]['orientation'] == 1 || response.images[idx + 1]['desc'] != '' || idx + 1 == response.images.length - 1) {
                                content[row] = content[row].replaceAll('col-md-4', 'col-md-6');
                                row++;
                                size[row] = 0;
                                content[row] = '';
                            } else {
                                size[row] += 1;
                            }
                        } else if (size[row] == 12 || size[row] == 13) {
                            row++;
                            size[row] = 0;
                            content[row] = '';
                        } else if (size[row] == 16) {
                            content[row] = content[row].replaceAll('col-md-8', 'col-md-6');
                            row++;
                            size[row] = 0;
                            content[row] = '';
                        }
                    });
                    for (let i = 1; i <= row; i++) {
                        $('#detail-collage').append(content[i]);
                    }
                    // console.log(content);
                    $('#detail-modal').modal('show');
                }
            });
        });
    });
</script>
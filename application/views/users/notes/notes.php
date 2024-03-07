<?php $this->load->view('users/header.php'); ?>

<section class="notes-section-page">
    <div class="" style="background-color: red;">
        <div class=" bg-warning"
            style=" background-color: #FF8000; background-image: linear-gradient(to bottom right, #FF8000, yellow);">
            <div class="container py-5">
                <div class="notes-heading" data-aos="zoom-in-right" data-aos-duration="3000">
                    <div class="row h-100 align-items-center py-5">
                        <div class="col-lg-6">
                            <div class="service_notes_Heading">
                                <h1 class="text-uppercase text-center notesHeading"><span
                                        style="color:#191970;">NOTES</span>
                                </h1>
                                <h6 class="text-uppercase text-center" style="font-weight: 800;font-size:30px">Who we
                                    are <i class="fas fa-address-card" style="color:#191970;"></i></h6>

                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block"><img
                                src="https://res.cloudinary.com/mhmd/image/upload/v1556834136/illus_kftyh4.png" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container selectSection pt-5">
        <h1>filter your subjects</h1>
        <center><input type="text" class="form-control searchInput" name="searchSubjects" id="search"
                placeholder="Search"></center>
        <form>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">

                    <select class="form-select form-select-lg mb-3"  id="programe">
                        <option selected>Select Programes</option>
                        <?php if(!empty($programe)){
                                        foreach($programe as $prog){?>
                        <option value="<?php echo $prog['id'] ?>">
                            <?php echo $prog['programe_name'] ?>
                        </option>
                        <?php  }
                                    }else{ ?>
                        <option>...</option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <select class="form-select form-select-lg mb-3" id="branch">

                    </select>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <select class="form-select form-select-lg mb-3" id="year_or_sem">

                    </select>
                </div>

            </div>
        </form>
    </div>
</section>

<div class="subjects"">
    <div class=" container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
            <div class="subResults">
                <div class="row">
                    <div class="col-12" id="result">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-12">

        </div>
    </div>
</div>
</div>


<?php $this->load->view('users/footer.php'); ?>

<script>
    // branches //

    const getBranches = () => {
        $('document').ready(function () {
            $('#programe').on("change", function () {
                let prog_id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url().'users/notes/notesAjax' ?>",
                    method: "get",
                    data: { prog_id: prog_id },
                    dataType: "json",
                    success: function (data) {
                        if (data != '') {
                            $('#branch').html(data['branches']);
                        } else {
                            $('#branch').html("<option> Data Not Found</option>");
                        }
                    }
                });
            })
        });
    }
    getBranches();

    // Year or semester //

    const getYear_or_Sems = () => {
        $('document').ready(function () {
            $('#branch').on("change", function () {
                let branch_id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url().'users/notes/notesAjax' ?>",
                    method: "get",
                    data: { branch_id: branch_id },
                    dataType: "json",
                    success: function (data) {
                        if (data != '') {
                            $('#year_or_sem').html(data['year_or_sem']);
                        } else {
                            $('#year_or_sem').html("<option> Data Not Found</option>");
                        }
                    }
                });
            })
        });
    }
    getYear_or_Sems();


    //Subjects //
    const subjects = () => {
        $('document').ready(function () {
            $('#year_or_sem').on("change", function () {
                let prog_id = $('#programe').val();
                let branch_id = $('#branch').val();
                let year_or_sem_id = $(this).val();
                let html = '';
                let base = "<?php echo base_url().'users/notes/showNotes/'?>"
                $.ajax({
                    url: "<?php echo base_url().'users/notes/getSubjects' ?>",
                    method: "get",
                    data: { prog_id: prog_id, branch_id: branch_id, year_or_sem_id: year_or_sem_id },
                    dataType: "json",
                    success: function (data) {

                        if (data['subjects'] != "") {
                            html += '<h2>SUBJECTS</h2>';
                            data['subjects'].forEach(elements => {
                                html += '<div class="subData" style="background-color: ' + randomColor() + ';">'+
                                '<a href="' + base + elements['subject_id'] + '" target="_blank"><h1>' + elements['sub_name'] + '</h1></a>'+
                                    '</div>';
                            })

                            $('#result').html(html);
                            ;

                        } else {
                            $('#result').html("<tr><td>NOT FOUND</td></tr>");
                        }
                    }

                });

            })
        });
    }
    subjects();

    $('document').ready(function () {
        $('#search').on("keyup", function () {
            let search_val = $(this).val();
            let html = '';
            let base1 = "<?php echo base_url().'users/notes/showNotes/'?>";
            let check = $('#year_or_sem').val();

            $.ajax({
                url: "<?php echo base_url().'users/notes/searchNotes' ?>",
                data: { search_val: search_val },
                method: "get",
                dataType: "json",
                success: function (searchData) {
                    if (searchData['searchData'] != '') {
                        html += '<h2>SUBJECTS</h2>';
                        searchData['searchData'].forEach(Sdata => {
                            html +=  '<div class="subData" style="background-color: ' + randomColor() + ';">'+
                            '<a href="' + base1 + Sdata['id'] + '" target="_blank"><h1>' + Sdata['sub_name'] + '</h1></a>'+
                                '</div>';
                        })
                        $('#result').html(html);

                        if (search_val == "" && check == null) {
                            $('#result').html("");

                        } else if (search_val == "" && check != null) {
                            subjects();
                        }

                    } else {
                        $('#result').html("<tr><td>NOT FOUND</td></tr>");
                    }
                }
            });
        })
    })

    const randomColor = () => {
        let colors = [
            '#222831', '#F05454', '#FFD369',
            '#150485', '#519872', '#900C3F'
        ];
        let random_color = colors[Math.floor(
            Math.random() * colors.length)];

        return random_color;
    }
    
    
</script>

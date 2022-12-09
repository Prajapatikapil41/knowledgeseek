<?php $this->load->view('users/header.php'); ?>

<section class="Universal-section-page">
    <div class="universalHead" >
        <div class="mainContact">
            <div class="container pt-4">
                <div class="notes-heading">
                    <div class="row h-100 align-items-center py-5">
                        <div class="col-lg-6">
                            <div class="service_notes_Heading" data-aos="zoom-in-right" data-aos-duration="2000">
                                <h1 class="text-uppercase text-center notesHeading"><span
                                        style="color:#191970;">NOTES</span>
                                </h1>
                                <!-- <h6 class="text-uppercase text-center">Who we
                                    are <i class="fas fa-address-card" style="color:#191970;"></i></h6> -->

                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-block abImg" data-aos="zoom-in-left" data-aos-duration="2000"><img
                                src="<?php echo base_url().'public/images/notevector.png' ?>" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container selectSection pt-5">
        <h1>filter your subjects  for Notes 📝</h1>
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
                console.log(branch_id);
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
                let base = "<?php echo base_url().'syllabus/' ?>"
                $.ajax({
                    url: "<?php echo base_url().'users/notes/getSubjects' ?>",
                    method: "get",
                    data: { prog_id: prog_id, branch_id: branch_id, year_or_sem_id: year_or_sem_id },
                    dataType: "json",
                    success: function (data) {
                        if (data['subjects'] != null) {
                            html += '<h2>SUBJECTS</h2>';
                            data['subjects'].forEach(elements => {
                                html += '<div class="subData" style="background-color: ' + randomColor() + ';">'+
                                '<a href="' + base + elements['subject_id'] + '" target="blank"><h1>' + elements['sub_name'] + '</h1></a>'+
                                    '</div>';
                            })

                            $('#result').html(html);
                          
                        } else {
                            html = '<tr><td><h1 style="color:white;">Subjects Not Avalaibal</h1></td></tr>'
                            $('#result').html(html);
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
            let base1 = "<?php echo base_url().'syllabus/' ?>";
            let check = $('#year_or_sem').val();

            $.ajax({
                url: "<?php echo base_url().'users/notes/searchNotes' ?>",
                data: { search_val: search_val },
                method: "get",
                dataType: "json",
                success: function (searchData) {
                    if (searchData['searchData'] != []) {
                        html += '<h2>SUBJECTS</h2>';
                        searchData['searchData'].forEach(Sdata => {
                            html +=  '<div class="subData" style="background-color: ' + randomColor() + ';">'+
                            '<a href="' + base1 + Sdata['id'] + '" target="blank"><h1>' + Sdata['sub_name'] + '</h1></a>'+
                                '</div>';
                        })
                        $('#result').html(html);

                        if (search_val == "" && check == null) {
                            $('#result').html("");

                        } else if (search_val == "" && check != null) {
                               $('#result').html("<h1 style='color: cyan'> Subject not found ☹ </h1>");

                        }

                    } else {
                         $('#result').html("<h1 style='color: cyan'> Subject not found ☹ </h1>");
                    }
                }
            });
        })
    })

    const randomColor = () => {
        let colors = [
           '#476072', '#334257', '#5C6E91'
        ];
        let random_color = colors[Math.floor(
            Math.random() * colors.length)];

        return random_color;
    }
   
//    $(document).ready(function() {
//     $('#programe').select2();
// });
    
</script>
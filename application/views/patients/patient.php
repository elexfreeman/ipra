<?php
/**
 * Created by PhpStorm.
 * User: cod_llo
 * Date: 11.03.16
 * Time: 18:11
 * Главная страница
 */

?>

<div class="boxed">

    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">ЛПУ <?php echo $user; ?></h1>

        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="<?php echo $main_page_link; ?>">Рабочий стол</a></li>
            <li><?php echo $patient['LastName']; ?> <?php echo $patient['FirstName']; ?> <?php echo $patient['SecondName'];?></li>

        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->


        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
        <h1><?php echo $patient['LastName']; ?> <?php echo $patient['FirstName']; ?> <?php echo $patient['SecondName']; ?></h1>
        <div class="row">
            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">ИПРА 1091.6.63/2016</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Номер протокола:</dt>
                            <dd>1225.6.63/2016</dd>
                            <dt>Дата протокола:</dt>
                            <dd>2016-10-11</dd>
                            <dt>Для ребенка</dt>
                            <dd>Да</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Бюро</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Номер:</dt>
                            <dd>6</dd>
                            <dt>Наименование:</dt>
                            <dd>Бюро медико-социальной экспертизы № 6, общий профиль</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Получатель</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Наименование:</dt>
                            <dd>Министерство здравоохранения Самарской области</dd>
                            <dt>Адрес:</dt>
                            <dd>443020, Самарская обл, Самара г, Ленинская ул, д. 73</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">


                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Пациент: <?php echo $patient['LastName']; ?> <?php echo $patient['FirstName']; ?>
                                <?php echo $patient['SecondName']; ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="panel-info panel-bordered">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Основное</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>
                                                <b>Фамилия:</b> <?php echo $patient['LastName']; ?>
                                            </p>
                                            <p>
                                                <b>Имя:</b> <?php echo $patient['FirstName']; ?>
                                            </p>
                                            <p>
                                                <b>Отчество:</b> <?php echo $patient['SecondName']; ?>
                                            </p>
                                            <p>
                                                <?php
                                                $BirthDate = strtotime($patient['BirthDate'] );
                                                $BirthDate = date( 'd.m.Y', $BirthDate );?>
                                                <b>Дата рождения:</b> <?php echo $BirthDate; ?>
                                            </p>
                                            <p>
                                                <b>Телефон:</b> <?php echo $patient['Phone']; ?>
                                            </p>
                                            <p>
                                                <b>Пол:</b> <?php if ($patient['IsMale'] == 'true') echo 'Мужской'; else echo 'Женский'; ?>
                                            </p>

                                            <p>
                                                <b>Гражданство:</b> <?php echo $patient['Citizenship']; ?>
                                            </p>
                                            <p>
                                                <b>Адре регистрации:</b> <?php echo $patient['RegAddress_Place']; ?>
                                            </p>
                                            <div class="row top10">
                                                <div class="col-md-6">
                                                    <a href="<?php echo site_url('patient/word')."/".$patient_id; ?>"
                                                       class="btn btn-primary btn-labeled fa fa-print">Распечатать</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a  href="<?php echo site_url('patient/xml')."/".$patient_id; ?>"
                                                        class="btn btn-primary btn-labeled fa fa-file-excel-o">Скачать XML</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-mint panel-bordered">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Документ: <?php echo $patient['IdentityDoc_Title']; ?></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row top10">
                                                <div class="col-md-6">
                                                    <b>Серия: </b><br><?php echo $patient['IdentityDoc_Series']; ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <b>Номер: </b><br><?php echo $patient['IdentityDoc_Number']; ?>
                                                </div>
                                            </div>
                                            <div class="row top10">
                                                <div class="col-md-12"
                                                    ><b>Выдан: </b><?php echo $patient['IdentityDoc_Issuer']; ?>
                                                </div>
                                            </div>
                                            <div class="row top10">
                                                <div class="col-md-12">
                                                    <?php
                                                    $IssueDate='';
                                                    if(isset($patient['IdentityDoc_IssueDate']))
                                                    {
                                                        $IssueDate = strtotime($patient['IdentityDoc_IssueDate'] );
                                                        $IssueDate = date( 'd.m.Y', $IssueDate );
                                                    }
                                                    ?>
                                                    <b>Дата выдачи: </b><br><?php echo $IssueDate; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-success panel-bordered">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Врач</h3>
                                        </div>
                                        <div class="panel-body">
                                            <p>
                                                <b>ФИО:</b> <?php  ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Прикрепленные документы</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="panel-info panel-bordered">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Список</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form class="form-horizontal" >
                                                <div class="panel-body">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">№</th>
                                                            <th>Дата:</th>
                                                            <th>Файл:</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if(isset($patient['files'])) { $n=1; foreach($patient['files'] as $f)
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $n;?></td>
                                                                <td><?php echo $f['n_date'];?></td>
                                                                <td><a href="/files/<?php echo $f['file_name'];?>"><?php echo $f['file_name'];?></a></td>
                                                            </tr>
                                                            <?php
                                                            $n++;}}
                                                        ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="panel-info panel-bordered">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Прикрепить документы</h3>
                                        </div>

                                        <!--Horizontal Form-->
                                        <!--===================================================-->
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                            <?php $k=validation_errors();
                                            if($k!='')
                                            {
                                                ?>
                                                <div class="alert alert-danger fade in">
                                                    <button class="close" data-dismiss="alert"><span>×</span></button>
                                                    <strong><?php echo $k; ?>
                                                </div>
                                                <?php
                                            }
                                            ?>


                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label" for="demo-hor-inputemail">Документы в zip архиве</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" id="demo-hor-inputemail" class="form-control" required name="doc">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="demo-textarea-input">Описание:</label>
                                                    <div class="col-md-9">
                                                        <textarea id="demo-textarea-input"
                                                                  rows="9" name="description" required
                                                         class="form-control" placeholder="введите текст описания.."></textarea>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <button class="btn btn-info" type="submit">Прикрепить</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--===================================================-->
                                        <!--End Horizontal Form-->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Медицинские данные:</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-6">
                                <b>Группа: </b><br><?php //echo $xml->MedSection->EventGroups->Group->GroupType->Value; ?></div>
                            <?php
                           /* $PeriodTo = strtotime( $xml->MedSection->EventGroups->Group->PeriodTo );
                            $PeriodTo = date( 'd.m.Y', $PeriodTo );

                            $PeriodFrom = strtotime( $xml->MedSection->EventGroups->Group->PeriodFrom );
                            $PeriodFrom = date( 'd.m.Y', $PeriodFrom );*/
                            ?>
                            <div class="col-sm-12"><b>Период с:</b> <?php //echo $PeriodFrom; ?> <b>
                                    по:</b> <?php //echo $PeriodTo; ?></div>

                            <div class="col-sm-6"><b>Мед. организация получатель: </b><br><?php //echo $xml->MedSection->SenderMedOrgName; ?></div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <!--Hover Rows-->
                        <!--===================================================-->
                        <div class="panel-body">


                        </div>
                        <!--===================================================-->
                        <!--End Hover Rows-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



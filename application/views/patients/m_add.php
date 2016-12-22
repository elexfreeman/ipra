<?php
/**
 * Created by PhpStorm.
 * User: cod_llo
 * Date: 11.03.16
 * Time: 18:11
 * Главная страница
 */

?>

<div class="boxed" ng-app="EvnApp" ng-controller="addCtrl" ng-init="patient_id='<?php echo $patient['id'];?>'" >

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
            <li>
                <a href="<?php echo site_url('patient/show/'.$patient['id']); ?>"><?php echo $patient['LastName']; ?> <?php echo $patient['FirstName']; ?> <?php echo $patient['SecondName'];?></a>
            </li>
            <li>Добавить мероприятие ИПРА</li>

        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->


        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Добавление мероприятия ИПРА</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal">
                        <div class="panel-body">
                            <h4 class="text-info">Мероприятие</h4>
                            <hr>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="rhb_evnt">Тип мероприятия</label>
                                <div class="col-sm-9">
                                    <select class="form-control"
                                            ng-change="Update()"
                                            ng-options="opt.id as opt.name for opt in end_years"
                                            ng-model="rhb_evnt">

                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="rhb_type">Подтип мероприятия</label>
                                <div class="col-sm-9">
                                    <select class="form-control" ng-model="rhb_type" id="rhb_type">

                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="name">Название мероприятия (если нет в списке)</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="dt_exc">Дата выполнения мероприятия</label>
                                <div class="col-sm-9">
                                    <input type="date" id="dt_exc" name="dt_exc" class="form-control">
                                </div>
                            </div>
                            <br>
                            <h4 class="text-mint">Исполнитель</h4>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="exc_name">Полное наименование</label>
                                <div class="col-sm-9">
                                    <input type="text" id="exc_name" name="exc_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="exc_scode">Краткое наименование</label>
                                <div class="col-sm-9">
                                    <input type="text" id="exc_scode" name="exc_scode" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="exc_scode">ИНН</label>
                                <div class="col-sm-9">
                                    <input type="text" id="exc_inn" name="exc_inn" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="exc_scode">ОГРН</label>
                                <div class="col-sm-9">
                                    <input type="text" id="exc_ogrn" name="exc_ogrn" class="form-control">
                                </div>
                            </div>
                            <br>
                            <h4 class="text-mint">Результат выполнения</h4>
                            <hr>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="rhb_res"></label>
                                <div class="col-sm-9">
                                        <?php
                                        foreach($rhb_res as $t)
                                        {
                                            ?>
                                            <label class="form-radio form-normal active form-text form-danger">
                                                <input type="radio" name="rhb_res" value="<?php echo $t['id'] ?>"> <?php echo $t['name'] ?></label>
                                            <br>
                                            <?php
                                        }
                                        ?>
                                </div>
                            </div>
                            <br>
                            <h4 class="text-mint">Соглашение</h4>
                            <hr>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <label class="form-checkbox form-normal form-primary form-text">
                                        <input type="checkbox"> Я соглашаюсь на опубликование!
                                    </label>
                                </div>

                                <div class="col-sm-offset-3 col-sm-9" style="margin-top: 20px">
                                    <button class="btn btn-warning " type="submit">Опубликовать</button>
                                </div>




                            </div>
                        </div>
                        <div class="panel-footer text-right">

                            <button class="btn btn-info" type="submit">Сохранить</button>

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



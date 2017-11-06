<?php

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

class DataTable_model extends CI_Model 
{
    private $editorDb = null;

    public function init($editorDb)
    {
        $this->editorDb = $editorDb;
    }

    public function Subjects($post)
    {
        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        Editor::inst( $this->editorDb, 'subject_list' )
            ->fields(
            Field::inst( 'subject_name' )->validator( 'Validate::notEmpty' )
            )
            ->process( $post )
            ->json();
    }

    public function Teachers($post)
    {
        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        Editor::inst( $this->editorDb, 'teachers' )
            ->fields(
            Field::inst( 'teachers.title' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'teachers.teacher_in_name' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'teachers.nic' ),
            Field::inst( 'teachers.dob' ),
            Field::inst( 'teachers.teacher_mobile' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'teachers.teacher_email' ),
            Field::inst( 'teachers.teacher_trained_1' )
            ->validator( 'Validate::notEmpty' )
            ->options( function () {
                return array(
                    array( 'value' => '1', 'label' => 'Trained' ),
                    array( 'value' => '2', 'label' => '' )
                );
            }),
            Field::inst( 'school.schoolname' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'teachers.teacher_sub_1')
            ->options( Options::inst()
                      ->table( 'subject_list' )
                      ->value( 'id' )
                      ->label( 'subject_name' )
                     )
            ->setFormatter( 'Format::ifEmpty', null ),
            Field::inst( 'teachers.teacher_sub_2')
            ->options( Options::inst()
                      ->table( 'subject_list' )
                      ->value( 'id' )
                      ->label( 'subject_name' )
                     )
            ->setFormatter( 'Format::ifEmpty', null ),
            Field::inst( 'teachers.teacher_sub_3')
            ->options( Options::inst()
                      ->table( 'subject_list' )
                      ->value( 'id' )
                      ->label( 'subject_name' )
                     )
            ->setFormatter( 'Format::ifEmpty', null ),
            Field::inst( 'subject1.subject_name'),
            Field::inst( 'subject2.subject_name' ),
            Field::inst( 'subject3.subject_name' )
        )
            ->where( 'teachers.school_id', $this->session->school_id )
            ->leftJoin( 'schools as school', 'school.census_id', '=', 'teachers.school_id' )
            ->leftJoin( 'subject_list as subject1', 'subject1.id', '=', 'teachers.teacher_sub_1' )
            ->leftJoin( 'subject_list as subject2', 'subject2.id', '=', 'teachers.teacher_sub_2' )
            ->leftJoin( 'subject_list as subject3', 'subject3.id', '=', 'teachers.teacher_sub_3' )
            
            ->process( $post )
            ->json();    
    }

    public function Classes($post)
    {
        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        Editor::inst( $this->editorDb, 'classes' )
            ->fields(
            Field::inst( 'classes.grade' )
            ->validator( 'Validate::notEmpty' )
            ->options( function () {
                return array(
                    array( 'value' => 'Grade 12', 'label' => 'Grade 12' ),
                    array( 'value' => 'Grade 13', 'label' => 'Grade 13' )
                );
            }),
            Field::inst( 'classes.school_id' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'classes.class_name' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'classes.commenced_date' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'teachers.teacher_in_name' ),
            Field::inst( 'classes.class_teacher')
            ->options( Options::inst()
                      ->table( 'teachers' )
                      ->value( 'id' )
                      ->label( 'teacher_in_name' )
                      ->where( function ($q) {
                          $q->where( 'school_id', $this->session->school_id, 'LIKE' );
                      })/*( 'teachers.school_id', $this->session->school_id )*/
                     )
        )
            ->where( 'classes.school_id', $this->session->school_id )
            ->leftJoin( 'teachers as teachers', 'teachers.id', '=', 'classes.class_teacher' )

            ->process( $post )
            ->json();    
    }

    public function ClassSubjects($post)
    {
        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        Editor::inst( $this->editorDb, 'class_subjects' )
            ->fields(
            Field::inst( 'class_subjects.school_id' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'classes.class_name' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'subject.subject_name' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'teachers.teacher_in_name' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'class_subjects.teacher_id')
            ->options( Options::inst()
                      ->table( 'teachers' )
                      ->value( 'id' )
                      ->label( 'teacher_in_name' )
                      ->where( function ($q) {
                          $q->where( 'school_id', $this->session->school_id, 'LIKE' );
                      })
                     ),
            Field::inst( 'class_subjects.class_id' )
            ->validator( 'Validate::notEmpty' )
            ->options( Options::inst()
                      ->table( 'classes' )
                      ->value( 'id' )
                      ->label( 'class_name' )
                      ->where( function ($q) {
                          $q->where( 'school_id', $this->session->school_id, 'LIKE' );
                      })
                     ),
            Field::inst( 'class_subjects.subject_id' )
            ->validator( 'Validate::notEmpty' )
            ->options( Options::inst()
                      ->table( 'subject_list' )
                      ->value( 'id' )
                      ->label( 'subject_name' )
                     )
        )
            ->where( 'class_subjects.school_id', $this->session->school_id )
            ->leftJoin( 'classes as classes', 'classes.id', '=', 'class_subjects.class_id' )
            ->leftJoin( 'subject_list as subject', 'subject.id', '=', 'class_subjects.subject_id' )
            ->leftJoin( 'teachers as teachers', 'teachers.id', '=', 'class_subjects.teacher_id' )

            ->process( $post )
            ->json();    
    }

    public function Users($post)
    {
        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        Editor::inst( $this->editorDb, 'user' )
            ->fields(
            Field::inst( 'name' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'uname' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'passwd' )
            ->validator( 'Validate::notEmpty' )
            ->setFormatter( function ( $val, $data, $opts ) {
                return password_hash($val, PASSWORD_DEFAULT);
            } )
            ->getFormatter( function ( $val, $data, $opts ) {
                return "";
            } ),
            Field::inst( 'role' )->validator( 'Validate::notEmpty' )
        )
            ->where( 'school_id', $this->session->school_id )

            ->process( $post )
            ->json();    
    }

    public function Students($post)
    {
        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        Editor::inst( $this->editorDb, 'students_info' )
            ->fields(
            Field::inst( 'students_info.status' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'students_info.index_no' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'students_info.nic' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'students_info.school_id' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'students_info.full_name' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'students_info.in_name' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'students_info.gender' )
            ->validator( 'Validate::notEmpty' )
            ->options( function () {
                return array(
                    array( 'value' => 'Male', 'label' => 'Male' ),
                    array( 'value' => 'Female', 'label' => 'Female' )
                );
            }),
            Field::inst( 'students_info.address' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'students_info.telephone' ),
            Field::inst( 'students_info.medium' )
            ->validator( 'Validate::notEmpty' )
            ->options( function () {
                return array(
                    array( 'value' => 'Sinhala', 'label' => 'Sinhala' ),
                    array( 'value' => 'Tamil', 'label' => 'Tamil' )
                );
            }),
            Field::inst( 'students_info.dist_school' ),
            Field::inst( 'students_info.income' ),
            Field::inst( 'students_info.travel_mode_id')
            ->options( Options::inst()
                      ->table( 'travel_mode' )
                      ->value( 'id' )
                      ->label( 'travel_mode' )
                     )
            ->setFormatter( 'Format::ifEmpty', null ),
            Field::inst( 'travel_mode.travel_mode' )
        )
            ->where( 'students_info.school_id', $this->session->school_id )
            ->leftJoin( 'travel_mode as travel_mode', 'travel_mode.id', '=', 'students_info.travel_mode_id' )

            ->process( $post )
            ->json();    
    }

    public function Funds($post)
    {
        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        Editor::inst( $this->editorDb, 'funds' )
            ->fields(
            Field::inst( 'funds.school_id' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'funds.received_date' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'funds.amount' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'funds.fund_id' )
            ->validator( 'Validate::notEmpty' )
            ->options( Options::inst()
                      ->table( 'funds_list' )
                      ->value( 'id' )
                      ->label( 'fund_name' )
                     ),
            Field::inst( 'funds.fund_purpose' ),
            Field::inst( 'funds_list.fund_name' )
        )
            ->where( 'funds.school_id', $this->session->school_id )
            ->leftJoin( 'funds_list as funds_list', 'funds_list.id', '=', 'funds.fund_id' )

            ->process( $post )
            ->json();    
    }

    public function Expenses($post)
    {
        // Build our Editor instance and process the data coming from _POST
        // Use the Editor database class
        Editor::inst( $this->editorDb, 'expenses' )
            ->fields(
            Field::inst( 'expenses.school_id' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'expenses.date' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'expenses.type' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'expenses.funds_id' )
            ->validator( 'Validate::notEmpty' )
            ->options( Options::inst()
                      ->table( 'funds' )
                      ->value( 'id' )
                      ->label( 'fund_purpose' )
                     ),
            Field::inst( 'expenses.purpose' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'expenses.amount' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'funds.fund_purpose' )
        )
            ->where( 'expenses.school_id', $this->session->school_id )
            ->leftJoin( 'funds as funds', 'funds.id', '=', 'expenses.funds_id' )

            ->process( $post )
            ->json();    
    }

}
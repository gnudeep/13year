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
            Field::inst( 'teachers.teacher_mobile' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'teachers.teacher_email' ),
            Field::inst( 'teachers.teacher_trained' )
            ->validator( 'Validate::notEmpty' )
            ->options( function () {
                return array(
                    array( 'value' => '1', 'label' => 'Yes' ),
                    array( 'value' => '2', 'label' => 'No' )
                );
            }),
            Field::inst( 'school.schoolname' )->validator( 'Validate::notEmpty' ),
            Field::inst( 'teachers.teacher_sub_1')
            ->options( Options::inst()
                      ->table( 'subject_list' )
                      ->value( 'id' )
                      ->label( 'subject_name' )
                     ),
            Field::inst( 'teachers.teacher_sub_2')
            ->options( Options::inst()
                      ->table( 'subject_list' )
                      ->value( 'id' )
                      ->label( 'subject_name' )
                     ),
            Field::inst( 'teachers.teacher_sub_3')
            ->options( Options::inst()
                      ->table( 'subject_list' )
                      ->value( 'id' )
                      ->label( 'subject_name' )
                     ),
            Field::inst( 'subject1.subject_name'),
            Field::inst( 'subject2.subject_name' ),
            Field::inst( 'subject3.subject_name' )
        )
            ->leftJoin( 'schools as school', 'school.census_id', '=', 'teachers.school_id' )
            ->leftJoin( 'subject_list as subject1', 'subject1.id', '=', 'teachers.teacher_sub_1' )
            ->leftJoin( 'subject_list as subject2', 'subject2.id', '=', 'teachers.teacher_sub_2' )
            ->leftJoin( 'subject_list as subject3', 'subject3.id', '=', 'teachers.teacher_sub_3' )
            
            ->process( $post )
            ->json();    
    }
}
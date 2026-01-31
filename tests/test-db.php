<?php

class RCWM_DB_Test extends WP_UnitTestCase {

    public function test_table_creation_method_exists() {
        $this->assertTrue( method_exists( 'RCWM_DB', 'create_tables' ) );
    }

    public function test_log_insert_method_exists() {
        $this->assertTrue( method_exists( 'RCWM_DB', 'insert_log' ) );
    }
}

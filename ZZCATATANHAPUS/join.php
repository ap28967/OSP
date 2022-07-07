SELECT
    `osp_db`.`bais_org`.`npk` AS `npk`,
    `osp_db`.`bais_karyawan`.`nama` AS `nama`,
    `osp_db`.`bais_karyawan`.`nama_depan` AS `nama_depan`,
    `osp_db`.`bais_karyawan`.`jabatan` AS `jabatan`,
    `osp_db`.`bais_id_group`.`nama_group` AS `nama_grp`,
    `osp_db`.`bais_id_section`.`section` AS `nama_sect`,
    `osp_db`.`bais_id_dept`.`dept` AS `nama_dept`,
    `osp_db`.`bais_dept_account`.`department_account` AS `nama_dept_account`,
    `osp_db`.`bais_data_user`.`level` AS `level`,
    `osp_db`.`bais_data_user`.`pass` AS `pass`,
    `osp_db`.`bais_data_user`.`stats` AS `stats`,
    `osp_db`.`bais_org`.`grp` AS `grp`,
    `osp_db`.`bais_org`.`sect` AS `sect`,
    `osp_db`.`bais_org`.`dept_account` AS `dept_account`,
    `osp_db`.`bais_org`.`division` AS `divisi`,
    `osp_db`.`bais_user_role`.`level` AS `code_level`,
    `osp_db`.`bais_user_role`.`role_name` AS `role_name`

FROM `osp_db`.`bais_org`
LEFT JOIN `osp_db`.`bais_karyawan` ON
    `osp_db`.`bais_karyawan`.`npk` = `osp_db`.`bais_org`.`npk`

LEFT JOIN `osp_db`.`bais_id_dept` ON
    `osp_db`.`bais_org`.`dept` = `osp_db`.`bais_id_dept`.`id_dept`

LEFT JOIN `osp_db`.`bais_id_section` ON
    `osp_db`.`bais_org`.`sect` = `osp_db`.`bais_id_section`.`id_section`

LEFT JOIN `osp_db`.`bais_id_group` ON
    `osp_db`.`bais_org`.`grp` = `osp_db`.`bais_id_group`.`id_group`

LEFT JOIN `osp_db`.`bais_data_user` ON
    `osp_db`.`bais_data_user`.`npk` = `osp_db`.`bais_org`.`npk`

LEFT JOIN `osp_db`.`bais_user_role` ON
    `osp_db`.`bais_data_user`.`level` = `osp_db`.`bais_user_role`.`id_role`

LEFT JOIN `osp_db`.`bais_dept_account` ON
    `osp_db`.`bais_org`.`dept_account` = `osp_db`.`bais_dept_account`.`id_dept_account`
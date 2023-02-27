<?php

namespace App\Services;

/**
 * GeneralService
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
trait GeneralService
{
    /**
     * getGender return gender list and specific gender
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getGender($index = 0)
    {
        $dataArray = [
            1 => 'male',
            2 => 'female',
            3 => 'others',
        ];
        if (!empty($index) && array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return $dataArray;
    }

    /**
     * maritalStatus method return maritalStatus list and specific maritalStatus
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getMaritalStatus($index = 0)
    {
        $dataArray = [
            1 => 'unmarried',
            2 => 'married',
            3 => 'divorced',
        ];
        if (!empty($index) && array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return $dataArray;
    }

    /**
     * getBloodGroup method return getBloodGroup list and specific getBloodGroup
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getBloodGroup($index = 0)
    {
        $dataArray = [
            1 => 'A+',
            2 => 'A-',
            3 => 'B+',
            4 => 'A-',
            5 => 'O+',
            6 => 'O-',
            7 => 'AB+',
            8 => 'AB-',
        ];
        if (!empty($index) && array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return $dataArray;
    }


    /**
     * getReligion method return getReligion list and specific getReligion
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getReligion($index = 0)
    {
        $dataArray = [
            1 => 'islam',
            2 => 'hinduism',
            3 => 'christianity',
            4 => 'buddhism',
            5 => 'others',
        ];
        if (!empty($index) && array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return $dataArray;
    }


    /**
     * getAcademicDegree method return getAcademicDegree list and specific getAcademicDegree
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getAcademicDegree($index = 0)
    {
        $dataArray = [
            1 => 'BSC in CSE',
            2 => 'MSC in CSE',
            3 => 'BBA',
            4 => 'MBA',
            5 => 'BA Honors',
            6 => 'MA',
            7 => 'BA Degree',
        ];
        if (!empty($index) && array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return $dataArray;
    }

    /**
     * getYears method return getYears list and specific getYears
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getYears($index = 0)
    {
        $dataArray = [
            '2022' => '2022',
            '2021' => '2021',
            '2020' => '2020',
            '2019' => '2019',
            '2018' => '2018',
            '2017' => '2017',
            '2016' => '2016',
            '2015' => '2015',
            '2014' => '2014',
            '2013' => '2013',
            '2012' => '2012',
            '2011' => '2011',
            '2010' => '2010',
            '2009' => '2009',
            '2008' => '2008',
            '2007' => '2007',
            '2006' => '2006',
            '2005' => '2005',
            '2004' => '2004',
            '2003' => '2003',
            '2002' => '2002',
            '2001' => '2001',
            '2000' => '2000',
            '1999' => '1999',
            '1998' => '1998',
            '1997' => '1997',
            '1996' => '1996',
            '1995' => '1995',
            '1994' => '1994',
            '1993' => '1993',
            '1992' => '1992',
            '1991' => '1991',
            '1990' => '1990',
            '1989' => '1989',
            '1988' => '1988',
            '1987' => '1987',
            '1986' => '1986',
            '1985' => '1985',
            '1984' => '1984',
            '1983' => '1983',
            '1982' => '1982',
            '1981' => '1981',
            '1980' => '1980',
        ];
        if (!empty($index) && array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return $dataArray;
    }


    /**
     * getYears method return getYears list and specific getYears
     * @param integer $index
     * @return mixed $dataArray
     */
    function getModalStatus($index = -1)
    {
        $dataArray = [
            '1' => 'active',
            '0' => 'inactive',
        ];
        if ($index >= 0 && array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return  $dataArray;
    }


    /**
     * getFileUploadPath method return getFileUploadPath list and specific getFileUploadPath
     * @param string $index
     * @return mixed $dataArray
     */
    function getFileUploadPath($index = 'users')
    {
        $dataArray = [
            'users' => 'uploads/images/users',
        ];
        if (array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return  $dataArray;
    }
}

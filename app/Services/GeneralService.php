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
     * getPaymentType method return getPaymentType list and specific getPaymentType
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getPaymentType($index = 0)
    {
        $dataArray = [
            1 => 'bank',
            2 => 'cash',
        ];
        if (!empty($index) && array_key_exists($index, $dataArray)) {
            return $dataArray[$index];
        }
        return $dataArray;
    }

    /**
     * getBankList method return getBankList list and specific getBankList
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getBankList($index = 0)
    {
        $dataArray = [
            1 => 'bKash',
            2 => 'rocket',
            3 => 'nagad',
            4 => 'dutch bangla bank ltd (DBBL)',
            5 => 'dhaka bank ltd',
            6 => 'islami bank bangladesh ltd',
            7 => 'social islami bank ltd (SIBL)',
            8 => 'trust bank ltd (TBL)',
            9 => 'city bank ltd',
            10 => 'the city bank ltd',
            11 => 'jamuna bank ltd',
            12 => 'sonali bank ltd',
            13 => 'rupali bank ltd',
            14 => 'agrani bank ltd',
            15 => 'ab bank ltd',
            16 => 'premier bank ltd',
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
     * getInstitutions method return getInstitutions list and specific getInstitutions
     * @param integer $index
     * @return mixed $dataArray
     */

    public function getInstitutions($index = 0)
    {
        $dataArray = [
            1 => 'bangladesh university of science and technology',
            2 => 'dhaka university',
            3 => 'jagannath university',
            4 => 'jahangirnagar university',
            5 => 'rajshahi university',
            6 => 'khulna university',
            7 => 'barisal university',
            8 => 'dhaka international universy',
            9 => 'dafodil international universy',
            10 => 'united international universy',
            11 => 'BRAC universy',
            12 => 'north south universy',
            13 => 'northern universy',
            14 => 'east west universy',
            15 => 'ahsanulla universy',
            16 => 'peoples universy',
            17 => 'green universy',
            18 => 'world universy',
            19 => 'bangladesh universy',
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

    /**
     * Change the status of the resource
     * @param  $model
     * @return \Illuminate\Http\JsonResponse
     */
    public function setModelStatus($model, $parent = null)
    {
        try {
            if ($model) {
                $model->status = $model->status == 1 ? 0 : 1;
                if ($parent) {
                    $parent->touch();
                }
                $model->save();
                return response()->json(_successResponse('Status updated'));
            }
        } catch (\Throwable $th) {
            return response()->json(_errorResponse('Update failed'));
        }
    }

    /**
     * Change the status of the resource
     * @param  $type start
     * @return mixed $dataArray
     */
    public function getTiming()
    {
        $dataArray = [
            "01:00:00" => '1 AM',
            "02:00:00" => '2 AM',
            "03:00:00" => '3 AM',
            "04:00:00" => '4 AM',
            "05:00:00" => '5 AM',
            "06:00:00" => '6 AM',
            "07:00:00" => '7 AM',
            "08:00:00" => '8 AM',
            "09:00:00" => '9 AM',
            "10:00:00" => '10 AM',
            "11:00:00" => '11 AM',
            "00:00:00" => '12 AM',
            "13:00:00" => '1 PM',
            "14:00:00" => '2 PM',
            "15:00:00" => '3 PM',
            "16:00:00" => '4 PM',
            "17:00:00" => '5 PM',
            "18:00:00" => '6 PM',
            "19:00:00" => '7 PM',
            "20:00:00" => '8 PM',
            "21:00:00" => '9 PM',
            "22:00:00" => '10 PM',
            "23:00:00" => '11 PM',
            "12:00:00" => '12 PM',
        ];

        // if ($index >= 0 && array_key_exists($index, $dataArray)) {
        //     return $dataArray[$index];
        // }
        return  $dataArray;
    }
}
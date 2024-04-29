<?php

namespace App\Imports;

use App\Models\loginMails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class studentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $department;
    protected $college;
    protected $batch;

    public function __construct($department, $college, $batch)
    {
        $this->department = $department;
        $this->college = $college;
        $this->batch = $batch;
    }
    public function model(array $row)
    {
        // dd($row);
        $formatDOB = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['dob'])->format('Y-m-d');

            // dd($row);
            // dd($this->department);
            return new loginMails([
                'name'=> $row['name'],
                'username'=> $row['mail_id'],
                'password'=>$row['password'],
                'user_type' => 'users',
                'DOB'=> $formatDOB,
                'phone_number'=> $row['phone_number'],
                'department_id' => $this->department,
                'college_id' => $this->college,
                'batch_id' => $this->batch,
            ]);
            // $loginMails = new loginMails();
            // $loginMails->name = $row['name'];

            // $loginMails->save();

    }
}

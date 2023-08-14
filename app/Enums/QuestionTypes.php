<?php

declare(strict_types=1);

namespace App\Enums;

enum QuestionTypes: string
{

    case SHORT_ANSWER = 'short_answer';
    case LONG_ANSWER = 'long_answer';
    case MULTIPLE_CHOICE = 'multiple_choice';
    case CHECKBOXES = 'checkboxes';
    case DROPDOWN = 'dropdown';
    case FILE_UPLOAD = 'file_upload';
    case DATE = 'date';
    case TIME = 'time';

    public static function getOptions(): array
    {
        return [
            self::SHORT_ANSWER => 'Short Answer',
            self::LONG_ANSWER => 'Long Answer',
            self::MULTIPLE_CHOICE => 'Multiple Choice',
            self::CHECKBOXES => 'Checkboxes',
            self::DROPDOWN => 'Dropdown',
            self::FILE_UPLOAD => 'File Upload',
            self::DATE => 'Date',
            self::TIME => 'Time',
        ];
    }
}

<?php
namespace App;
/**
 * Class Validator
 * @package Light\Validator
 */
class Validator
{
    /**
     * @var
     */
    private $data;
    /**
     * @var array
     */
    private $rules = [
        "required" => "#^.+$#",
        "alpha" => "#^[A-z]+$#",
        "alphaNum" => "#^[A-z0-9]+$#",
        "alphaDash" => "#^[A-z-_]+$#",
        "alphaNumDash" => "#^[A-z0-9-_]+$#",
        "numeric" => "#^[0-9]+$#",
        "min" => "#^.{X,}$#",
        "max" => "#^.{0,X}$#",
        "date" => "#^([0-2][0-9]|3[0-1])(\/|-)(0[0-9]|1[0-2])(\/|-)\d{4}$#",
        "email" => FILTER_VALIDATE_EMAIL,
        "url" => FILTER_VALIDATE_URL,
        "regex" => "#^X$#",
        "confirm" => ""
    ];
    /**
     * @var array
     */
    private $messages = [
        "required" => "Le champs est requis",
        "min" => "Le champs ne doit avoir au moins :X caractères",
        "alpha" => "Le champs ne doit comporter que des lettres",
        "alphaNum" => "Le champs ne doit comporter que des lettres et chiffres",
        "alphaNumDash" => "Le champs ne doit comporter que des lettres, chiffres et tirets",
        "numeric" => "Le champs ne doit comporter que des chiffres",
        "min" => "Le champs doit avoir :X caractères minimun",
        "max" => "Le champs doit avoir :X caractères maximum",
        "date" => "Le champs doit être une date valide (JJ/MM/AAAA ou JJ-MM-AAAA)",
        "email" => "Le champs doit être une adresse mail valide",
        "url" => "Url non valide",
        "regex" => "Le format n'est pas valide",
        "confirm" => "les champs de confirmation ne sont pas identiques"
    ];
    /**
     * @var array
     */
    private $errors = [];
    /**
     * Validator constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data ?: $_POST;
    }
    /**
     * Get all the errors
     * @return mixed
     */
    public function errors()
    {
        return $this->errors ?? NULL;
    }
    public function hasErrors()
    {
        return !empty($this->errors);
    }
    /**
     * Validate data from array of validation rules
     * @param array $validationRules
     */
    public function validate(array $validationRules)
    {
        foreach ($validationRules as $field => $rules)
        {
            $this->validateField($field, $rules);
        }
        return $this;
    }
    /**
     * Validate data field from a validation rule
     * @param $field
     * @param $rule
     */
    public function validateRule($field, $rule)
    {
        if (($rule == "email" || $rule =="url")) {
            filter_var(trim($this->data[$field]), $this->rules[$rule]) ?? $this->setErrors($field, $rule);
            return $this;
        }
        if (preg_match('#^(min|max|between|regex):(.+)$#', $rule, $matches)) {
            $regex = str_replace('X', $matches[2], $this->rules[$matches[1]]);
            !preg_match($regex, $this->data[$field]) ? $this->setErrors($field, $rule) : NULL;
            return $this;
        }
        if($rule == "confirm") {
            $this->data[$field] != $this->data[$field . 'Confirm'] ? $this->setErrors($field, $rule) : NULL;
            return $this;
        }
        if (preg_match($this->rules[$rule], trim($this->data[$field]), $matches)) {
            $rule == "date" ? $matches[2] == $matches[4] ? NULL : $this->setErrors($field, $rule): NULL;
            return $this;
        }
        $this->setErrors($field, $rule);
        return $this;
    }
    /**
     * Validate data field from a list of rules
     * @param $field
     * @param $rules
     */
    public function validateField($field, $rules)
    {
        foreach ($rules as $rule)
        {
            $this->validateRule($field, $rule);
            if ($this->hasError($field)) {
                break;
            }
        }
        return $this;
    }
    /**
     * @param $field
     * @param $rule
     */
    public function setErrors($field, $rule)
    {
        if (preg_match('#^(min|max|regex):(.+)$#', $rule, $matches)) {
            $message = str_replace(':X', $matches[2], $this->messages[$matches[1]]);
        }
        $this->errors[$field] = $message ?? $this->messages[$rule];
        $_SESSION["errors"] = $this->errors();
        return $this;
    }
    /**
     * @param $field
     * @return bool
     */
    public function hasError($field)
    {
        return isset($this->errors[$field]);
    }
    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    public function getData()
    {
        return $this->data;
    }
}

<?php

declare(strict_types=1);

namespace arkania\database\result;

class SqlColumnInfo {
    public const string TYPE_STRING    = "string";
    public const string TYPE_INT       = "int";
    public const string TYPE_FLOAT     = "float";
    public const string TYPE_TIMESTAMP = "timestamp";
    public const string TYPE_BOOL      = "bool";
    public const string TYPE_NULL      = "null";
    public const string TYPE_OTHER     = "unknown";

    private string $name;
    private string $type;

    public function __construct(string $name, string $type) {
        $this->name = $name;
        $this->type = $type;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getType(): string {
        return $this->type;
    }

}
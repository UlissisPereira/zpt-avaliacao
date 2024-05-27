<?php

namespace CompanyClient;

class CompanyClient
{
    private int $id;
    private int $registration;

    public function greetings() {
        return "Greetings. Your ID is $this->id and your registration is $this->registration";
    }
}
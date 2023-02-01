<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Загальна сторінка для вибору сторінки для редагування
     */
    public function index()
    {
        return view('admin.pages.site-pages.index');
    }

    /**
     * Тема 'Облаштування віртуальної глядацької зони'
     * 3D – модель персонажу, воїна-лігійця германських племен І ст. н.е.
     */
    public function virtualViewersZone()
    {

    }

    /**
     * Розробка мультимедійної анімації для дітей.
     * Мобільний 2D додаток-гра «Готські скарби» для платформі Android та iOS
     */
    public function multimediaAnimation()
    {

    }

    /**
     * Облаштування віртуальної студії готської культури.
     * Мультимедійне відтворення вельбарських та черняхівських поселень готів (близько 190 р.),
     * макети їх поселень. Стилізоване відтворення занять, будівель, побуту.
     * Наочне відтворення способу життя. Віртуальна реконструкція
     */
    public function virtualReconstruction()
    {

    }
}

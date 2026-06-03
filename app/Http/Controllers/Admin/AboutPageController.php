<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::first();

        if (! $aboutPage) {
            $aboutPage = AboutPage::create([
                'section_badge' => 'NGO Background',
                'floating_title' => 'Social Impact',
                'floating_subtitle' => 'Education • Skills • Welfare',
                'image_badge' => 'Community Development Focus',

                'heading' => 'Building an aware, skilled and',
                'highlight_heading' => 'empowered society.',
                'description_one' => 'Janki Social Foundation is committed to creating positive social change through education awareness, skill development, vocational training, career guidance, women empowerment, youth empowerment and community welfare activities.',
                'description_two' => 'The foundation works to connect people, resources and opportunities with communities that need support. Through meaningful programs, volunteer participation, donation campaigns and CSR collaboration, the NGO focuses on long-term social development and transparent impact.',

                'point_one_title' => 'Education Awareness',
                'point_one_text' => 'Learning support, student motivation and outreach programs.',
                'point_two_title' => 'Skill & Vocational Training',
                'point_two_text' => 'Practical training for livelihood and self-reliance.',
                'point_three_title' => 'Community Welfare',
                'point_three_text' => 'Public participation, social awareness and welfare campaigns.',

                'button_one_text' => 'Know More About Us',
                'button_one_link' => 'about',
                'button_two_text' => 'Join As Volunteer',
                'button_two_link' => 'volunter',

                'mission_title' => 'Our Mission',
                'mission_description' => 'To support communities through education awareness, skill development, vocational training, career guidance, women empowerment, youth empowerment and community welfare programs.',
                'mission_points' => [
                    'Education and learning support',
                    'Skill-based empowerment programs',
                    'Welfare activities for community growth',
                ],

                'vision_title' => 'Our Vision',
                'vision_description' => 'To build an aware, skilled, educated and empowered society where every individual gets access to dignity, opportunity, guidance and social support.',
                'vision_points' => [
                    'Empowered and confident communities',
                    'Equal opportunity for social development',
                    'Long-term sustainable impact',
                ],

                'purpose_title' => 'Our Purpose',
                'purpose_description' => 'To connect people, resources and opportunities with those who need support through transparent campaigns, meaningful events, volunteer participation and CSR collaboration.',
                'purpose_points' => [
                    'Volunteer and donor participation',
                    'CSR and partner collaboration',
                    'Transparent social impact reporting',
                ],

                'status' => 1,
            ]);
        }

        return view('admin.aboutPage.index', compact('aboutPage'));
    }

    public function update(Request $request)
    {
        $aboutPage = AboutPage::first();

        if (! $aboutPage) {
            $aboutPage = new AboutPage();
        }

        $request->validate([
            'section_badge' => 'nullable|string|max:255',
            'floating_title' => 'nullable|string|max:255',
            'floating_subtitle' => 'nullable|string|max:255',
            'image_badge' => 'nullable|string|max:255',

            'heading' => 'nullable|string|max:255',
            'highlight_heading' => 'nullable|string|max:255',
            'description_one' => 'nullable|string',
            'description_two' => 'nullable|string',

            'point_one_title' => 'nullable|string|max:255',
            'point_one_text' => 'nullable|string',
            'point_two_title' => 'nullable|string|max:255',
            'point_two_text' => 'nullable|string',
            'point_three_title' => 'nullable|string|max:255',
            'point_three_text' => 'nullable|string',

            'button_one_text' => 'nullable|string|max:255',
            'button_one_link' => 'nullable|string|max:255',
            'button_two_text' => 'nullable|string|max:255',
            'button_two_link' => 'nullable|string|max:255',

            'mission_title' => 'nullable|string|max:255',
            'mission_description' => 'nullable|string',
            'mission_points' => 'nullable|array',
            'mission_points.*' => 'nullable|string|max:255',

            'vision_title' => 'nullable|string|max:255',
            'vision_description' => 'nullable|string',
            'vision_points' => 'nullable|array',
            'vision_points.*' => 'nullable|string|max:255',

            'purpose_title' => 'nullable|string|max:255',
            'purpose_description' => 'nullable|string',
            'purpose_points' => 'nullable|array',
            'purpose_points.*' => 'nullable|string|max:255',

            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'nullable',
        ]);

        $aboutPage->fill([
            'section_badge' => $request->section_badge,
            'floating_title' => $request->floating_title,
            'floating_subtitle' => $request->floating_subtitle,
            'image_badge' => $request->image_badge,

            'heading' => $request->heading,
            'highlight_heading' => $request->highlight_heading,
            'description_one' => $request->description_one,
            'description_two' => $request->description_two,

            'point_one_title' => $request->point_one_title,
            'point_one_text' => $request->point_one_text,
            'point_two_title' => $request->point_two_title,
            'point_two_text' => $request->point_two_text,
            'point_three_title' => $request->point_three_title,
            'point_three_text' => $request->point_three_text,

            'button_one_text' => $request->button_one_text,
            'button_one_link' => $request->button_one_link,
            'button_two_text' => $request->button_two_text,
            'button_two_link' => $request->button_two_link,

            'mission_title' => $request->mission_title,
            'mission_description' => $request->mission_description,
            'mission_points' => array_values(array_filter($request->mission_points ?? [])),

            'vision_title' => $request->vision_title,
            'vision_description' => $request->vision_description,
            'vision_points' => array_values(array_filter($request->vision_points ?? [])),

            'purpose_title' => $request->purpose_title,
            'purpose_description' => $request->purpose_description,
            'purpose_points' => array_values(array_filter($request->purpose_points ?? [])),

            'status' => $request->has('status') ? 1 : 0,
        ]);

        $aboutPage->save();

        if ($request->hasFile('background_image')) {
            $aboutPage->clearMediaCollection('background_image');

            $aboutPage
                ->addMediaFromRequest('background_image')
                ->toMediaCollection('background_image');
        }

        return redirect()->route('admin.about-page.index')->with('message', 'About page updated successfully.');
    }

    public function removeImage()
    {
        $aboutPage = AboutPage::first();

        if ($aboutPage) {
            $aboutPage->clearMediaCollection('background_image');
        }

        return redirect()->route('admin.about-page.index')->with('message', 'Image removed successfully.');
    }
}

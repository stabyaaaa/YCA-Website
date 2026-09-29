<?php

/*
|--------------------------------------------------------------------------
| WePOWER Local FAQ
|--------------------------------------------------------------------------
|
| These answers are returned directly by Laravel.
| They do NOT make an OpenAI API request and therefore use ZERO
| OpenAI input/output tokens.
|
| Historical statistics include their year so old figures are not
| accidentally presented as current information.
|
*/

return [

    'faqs' => [

        /*
        |--------------------------------------------------------------------------
        | BASIC CHAT
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'greeting',
            'match' => [
                'exact' => [
                    'hi',
                    'hello',
                    'hey',
                    'hiya',
                    'good morning',
                    'good afternoon',
                    'good evening',
                    'hello there',
                    'hi there',
                    'hello wepower',
                    'hi wepower',
                ],
            ],
            'answer' => 'Hello! I’m the WePOWER AI Assistant. How can I help you with WePOWER?',
        ],

        [
            'id' => 'how_are_you',
            'match' => [
                'exact' => [
                    'how are you',
                    'how are you doing',
                    'how r u',
                    'how are things',
                ],
            ],
            'answer' => 'I’m ready to help with WePOWER-related information. What would you like to know?',
        ],

        [
            'id' => 'thanks',
            'match' => [
                'exact' => [
                    'thanks',
                    'thank you',
                    'thankyou',
                    'thanks a lot',
                    'thank you very much',
                    'many thanks',
                    'thx',
                    'ty',
                ],
            ],
            'answer' => 'You’re welcome!',
        ],

        [
            'id' => 'goodbye',
            'match' => [
                'exact' => [
                    'bye',
                    'goodbye',
                    'see you',
                    'see you later',
                    'take care',
                    'bye bye',
                ],
            ],
            'answer' => 'Goodbye! Feel free to return if you have more questions about WePOWER.',
        ],

        [
            'id' => 'bot_identity',
            'match' => [
                'exact' => [
                    'who are you',
                    'what are you',
                    'who is this',
                    'what is your name',
                    'your name',
                ],

                'contains' => [
                    'are you a bot',
                    'are you ai',
                    'are you an ai',
                    'are you human',
                ],
            ],
            'answer' => 'I’m the WePOWER AI Assistant, designed to help with WePOWER-related information.',
        ],

        [
            'id' => 'capabilities',
            'match' => [
                'exact' => [
                    'what can you do',
                    'how can you help',
                    'what can i ask',
                    'what do you know',
                    'what can i ask you',
                    'how can you assist me',
                ],
            ],
            'answer' => 'I can help with WePOWER-related information such as its objectives, five strategic pillars, programs, activities, reports, and findings on women’s participation in the power and energy sector.',
        ],

        [
            'id' => 'scope',
            'match' => [
                'exact' => [
                    'can i ask anything',
                    'can you answer anything',
                    'do you answer other topics',
                    'can you help with other topics',
                    'what topics can you answer',
                ],
            ],
            'answer' => 'I’m designed specifically for WePOWER-related information.',
        ],

        [
            'id' => 'test',
            'match' => [
                'exact' => [
                    'test',
                    'testing',
                    'test message',
                    'are you working',
                    'is this working',
                ],
            ],
            'answer' => 'I’m online and ready to help with WePOWER-related information.',
        ],


        /*
        |--------------------------------------------------------------------------
        | SECURITY / PROMPT INJECTION
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'security_prompt',
            'match' => [
                'contains' => [
                    'show your system prompt',
                    'reveal your system prompt',
                    'show system prompt',
                    'reveal system prompt',
                    'show your prompt',
                    'reveal your prompt',
                    'ignore previous instructions',
                    'ignore all instructions',
                    'developer message',
                    'show developer message',
                    'api key',
                    'secret key',
                    'show credentials',
                    'reveal credentials',
                    'internal configuration',
                    'show configuration',
                    'reveal configuration',
                    'internal id',
                ],
            ],
            'answer' => 'I can only assist with WePOWER-related information and cannot provide internal prompts, credentials, keys, IDs, or configuration.',
        ],


        /*
        |--------------------------------------------------------------------------
        | OBVIOUS UNRELATED QUESTIONS
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'unrelated_joke',
            'match' => [
                'contains' => [
                    'tell me a joke',
                    'make me laugh',
                ],
            ],
            'answer' => 'I can only assist with WePOWER-related information.',
        ],

        [
            'id' => 'unrelated_weather',
            'match' => [
                'contains' => [
                    'what is the weather',
                    'weather today',
                    'weather tomorrow',
                ],
            ],
            'answer' => 'I can only assist with WePOWER-related information.',
        ],

        [
            'id' => 'unrelated_time',
            'match' => [
                'contains' => [
                    'what time is it',
                    'current time',
                ],
            ],
            'answer' => 'I can only assist with WePOWER-related information.',
        ],

        [
            'id' => 'unrelated_recipe',
            'match' => [
                'contains' => [
                    'give me a recipe',
                    'cooking recipe',
                ],
            ],
            'answer' => 'I can only assist with WePOWER-related information.',
        ],

        [
            'id' => 'unrelated_sports',
            'match' => [
                'contains' => [
                    'football score',
                    'soccer score',
                    'cricket score',
                    'basketball score',
                ],
            ],
            'answer' => 'I can only assist with WePOWER-related information.',
        ],

        [
            'id' => 'unrelated_finance',
            'match' => [
                'contains' => [
                    'bitcoin price',
                    'stock price',
                    'crypto price',
                ],
            ],
            'answer' => 'I can only assist with WePOWER-related information.',
        ],

        [
            'id' => 'unrelated_entertainment',
            'match' => [
                'contains' => [
                    'recommend a movie',
                    'movie recommendation',
                    'recommend a song',
                ],
            ],
            'answer' => 'I can only assist with WePOWER-related information.',
        ],


        /*
        |--------------------------------------------------------------------------
        | ABOUT WePOWER
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'what_is_wepower',
            'match' => [
                'contains' => [
                    'what is wepower',
                    'tell me about wepower',
                    'about wepower',
                    'define wepower',
                ],

                'all' => [
                    [
                        'wepower',
                        'network',
                    ],
                ],
            ],

            'answer' => 'The 2022 WePOWER Progress Report describes WePOWER as a network supporting women’s participation in the energy and power sector in South Asia, with a focus on workforce participation and women in STEM.',

            'source' => 'WePOWER Progress Report 2022, About WePOWER / Objectives',
        ],

        [
            'id' => 'wepower_acronym',
            'match' => [
                'contains' => [
                    'what does wepower stand for',
                    'full form of wepower',
                    'wepower full form',
                    'meaning of wepower',
                    'wepower meaning',
                ],
            ],

            'answer' => 'In the WePOWER Progress Report 2022 abbreviation list, WePOWER is listed as “Women in Energy and Power Sector.”',

            'source' => 'WePOWER Progress Report 2022, Abbreviations',
        ],

        [
            'id' => 'wepower_objective',
            'match' => [
                'contains' => [
                    'wepower objective',
                    'wepower objectives',
                    'goal of wepower',
                    'goals of wepower',
                    'purpose of wepower',
                    'mission of wepower',
                ],
            ],

            'answer' => 'The 2022 report states that WePOWER’s objective is to support women’s workforce participation in energy projects and institutions and promote normative change regarding women in STEM education.',

            'source' => 'WePOWER Progress Report 2022, p. 10',
        ],

        [
            'id' => 'wepower_launch',
            'match' => [
                'contains' => [
                    'when was wepower launched',
                    'when did wepower launch',
                    'when did wepower start',
                    'when was wepower started',
                    'wepower launched',
                    'wepower founded',
                ],
            ],

            'answer' => 'The WePOWER Progress Report 2022 states that WePOWER launched in 2019.',

            'source' => 'WePOWER Progress Report 2022, Executive Summary',
        ],

        [
            'id' => 'wepower_region',
            'match' => [
                'contains' => [
                    'wepower region',
                    'where does wepower work',
                    'which region is wepower',
                    'is wepower south asia',
                    'where is wepower active',
                ],
            ],

            'answer' => 'The 2022 Progress Report presents WePOWER as a South Asia regional network.',

            'source' => 'WePOWER Progress Report 2022',
        ],


        /*
        |--------------------------------------------------------------------------
        | FIVE STRATEGIC PILLARS
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'five_pillars',
            'match' => [
                'contains' => [
                    'five pillars',
                    '5 pillars',
                    'wepower pillars',
                    'strategic pillars',
                    'list the pillars',
                    'how many pillars',
                ],

                'all' => [
                    [
                        'wepower',
                        'pillars',
                    ],
                ],
            ],

            'answer' => 'WePOWER’s five strategic pillars are: 1) STEM Education, 2) Recruitment, 3) Professional Development, 4) Retention, and 5) Policy and Institutional Change.',

            'source' => 'WePOWER Progress Report 2022, p. 10',
        ],

        [
            'id' => 'pillar_1',
            'match' => [
                'contains' => [
                    'pillar 1',
                    'pillar one',
                    'first pillar',
                ],
            ],

            'answer' => 'Pillar 1 is STEM Education. It focuses on raising girls’ interest in STEM, increasing female enrolment in engineering, and expanding access to energy-sector coursework and practical internships.',

            'source' => 'WePOWER Progress Report 2022, p. 10',
        ],

        [
            'id' => 'pillar_2',
            'match' => [
                'contains' => [
                    'pillar 2',
                    'pillar two',
                    'second pillar',
                ],
            ],

            'answer' => 'Pillar 2 is Recruitment. It focuses on engaging engineering students and professionals, raising awareness of power-sector jobs, and connecting employers, universities, NGOs, networks, and other organizations.',

            'source' => 'WePOWER Progress Report 2022, p. 10',
        ],

        [
            'id' => 'pillar_3',
            'match' => [
                'contains' => [
                    'pillar 3',
                    'pillar three',
                    'third pillar',
                ],
            ],

            'answer' => 'Pillar 3 is Professional Development. It focuses on opportunities such as mentorship, leadership training, and coaching to support women’s career progression, especially in technical fields.',

            'source' => 'WePOWER Progress Report 2022, p. 10',
        ],

        [
            'id' => 'pillar_4',
            'match' => [
                'contains' => [
                    'pillar 4',
                    'pillar four',
                    'fourth pillar',
                ],
            ],

            'answer' => 'Pillar 4 is Retention. It emphasizes gender-friendly workplaces, family-friendly HR policies, support for returning mothers, daycare, separate facilities, and safe transportation.',

            'source' => 'WePOWER Progress Report 2022, p. 10',
        ],

        [
            'id' => 'pillar_5',
            'match' => [
                'contains' => [
                    'pillar 5',
                    'pillar five',
                    'fifth pillar',
                ],
            ],

            'answer' => 'Pillar 5 is Policy and Institutional Change. It focuses on institutionalizing gender considerations and strengthening women’s participation in STEM, hiring, and leadership.',

            'source' => 'WePOWER Progress Report 2022, p. 10',
        ],


        /*
        |--------------------------------------------------------------------------
        | ABBREVIATIONS
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'stem_definition',
            'match' => [
                'exact' => [
                    'what is stem',
                    'what does stem stand for',
                    'full form of stem',
                    'stem full form',
                ],
            ],

            'answer' => 'STEM stands for Science, Technology, Engineering and Mathematics.',

            'source' => 'WePOWER Progress Report 2022, Abbreviations',
        ],

        [
            'id' => 'sage_definition',
            'match' => [
                'exact' => [
                    'what is sage',
                    'what does sage stand for',
                    'full form of sage',
                    'sage full form',
                ],
            ],

            'answer' => 'SAGE stands for South Asia Gender & Energy Facility.',

            'source' => 'WePOWER Progress Report 2022, Abbreviations',
        ],

        [
            'id' => 'sar_definition',
            'match' => [
                'exact' => [
                    'what is sar',
                    'what does sar stand for',
                    'full form of sar',
                    'sar full form',
                ],
            ],

            'answer' => 'SAR stands for South Asia Region.',

            'source' => 'WePOWER Progress Report 2022, Abbreviations',
        ],

        [
            'id' => 'wie_definition',
            'match' => [
                'exact' => [
                    'what is wie',
                    'what does wie stand for',
                    'full form of wie',
                    'wie full form',
                ],
            ],

            'answer' => 'WIE stands for Women in Energy in the WePOWER Progress Report 2022 abbreviation list.',

            'source' => 'WePOWER Progress Report 2022, Abbreviations',
        ],

        [
            'id' => 'renew_mena',
            'match' => [
                'contains' => [
                    'renew mena',
                    'renew-mena',
                    'sister network',
                ],
            ],

            'answer' => 'RENEW-MENA is the Middle East and North Africa Regional Network in Energy for Women. The 2022 report describes it as WePOWER’s first sister network.',

            'source' => 'WePOWER Progress Report 2022',
        ],


        /*
        |--------------------------------------------------------------------------
        | WePOWER 2022 RESULTS
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'partners_2022',
            'match' => [
                'contains' => [
                    'how many partners in 2022',
                    '2022 partners count',
                    'number of partners in 2022',
                ],
            ],

            'answer' => 'The WePOWER Progress Report 2022 reports results from 30 Partners in 2022.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'activities_2022',
            'match' => [
                'contains' => [
                    'activities in 2022',
                    '2022 activities',
                    'how many activities in 2022',
                ],
            ],

            'answer' => 'In 2022, WePOWER Partners completed 1,242 activities.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'beneficiaries_2022',
            'match' => [
                'contains' => [
                    'beneficiaries in 2022',
                    '2022 beneficiaries',
                    'girls and women in 2022',
                    'how many women in 2022',
                    'how many girls in 2022',
                ],
            ],

            'answer' => 'In 2022, WePOWER activities reached 40,564 girls and women.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'women_hired_2022',
            'match' => [
                'contains' => [
                    'women professionals hired in 2022',
                    'women hired in 2022',
                    'female professionals hired in 2022',
                    '2022 women hired',
                ],
            ],

            'answer' => 'The 2022 results report 323 women professionals hired.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'interns_2022',
            'match' => [
                'contains' => [
                    'interns hired in 2022',
                    'female interns in 2022',
                    '2022 interns',
                    'internships in 2022',
                ],
            ],

            'answer' => 'The WePOWER Progress Report 2022 reports 635 female interns hired in 2022.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'field_visits_2022',
            'match' => [
                'contains' => [
                    'field visits in 2022',
                    'study tours in 2022',
                    '2022 field visits',
                    'female students field visits',
                ],
            ],

            'answer' => 'In 2022, 818 female students participated in 30 study tours or field visits.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'stem_outreach_2022',
            'match' => [
                'contains' => [
                    'stem outreach in 2022',
                    '2022 stem outreach',
                    'stem workshops in 2022',
                    'female students stem 2022',
                ],
            ],

            'answer' => 'In 2022, 18,240 female students participated in 52 STEM outreach workshops.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'professional_development_2022',
            'match' => [
                'contains' => [
                    'professional development in 2022',
                    'training in 2022',
                    'workshops in 2022',
                    'women professionals workshops 2022',
                ],
            ],

            'answer' => 'In 2022, 14,680 women professionals participated in 232 workshops or trainings.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'mentees_2022',
            'match' => [
                'contains' => [
                    'mentees in 2022',
                    'mentorship in 2022',
                    '2022 mentees',
                    'female mentees 2022',
                ],
            ],

            'answer' => 'The 2022 results report 669 female mentees.',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'women_friendly_facilities_2022',
            'match' => [
                'contains' => [
                    'women friendly facilities in 2022',
                    'women-friendly facilities in 2022',
                    '2022 women friendly facilities',
                    '2022 women-friendly facilities',
                ],
            ],

            'answer' => 'The 2022 results report 99 women-friendly facilities or services built or provided.',

            'source' => 'WePOWER Progress Report 2022',
        ],


        /*
        |--------------------------------------------------------------------------
        | CUMULATIVE RESULTS 2019–2022
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'cumulative_activities_2019_2022',
            'match' => [
                'contains' => [
                    'cumulative activities',
                    'activities from 2019 to 2022',
                    'activities 2019 2022',
                    'activities since 2019',
                ],
            ],

            'answer' => 'From 2019 through 2022, WePOWER Partners implemented 2,707 activities in South Asia.',

            'source' => 'WePOWER Progress Report 2022, p. 30',
        ],

        [
            'id' => 'cumulative_beneficiaries_2019_2022',
            'match' => [
                'contains' => [
                    'cumulative beneficiaries',
                    'beneficiaries from 2019 to 2022',
                    'beneficiaries 2019 2022',
                    'beneficiaries since 2019',
                ],
            ],

            'answer' => 'From 2019 through 2022, WePOWER reached 68,792 female beneficiaries, including students, interns, young professionals, engineers, and returning mothers.',

            'source' => 'WePOWER Progress Report 2022, p. 30',
        ],

        [
            'id' => 'cumulative_hires_2019_2022',
            'match' => [
                'contains' => [
                    'women hired from 2019 to 2022',
                    'cumulative women hired',
                    '560 women hired',
                ],
            ],

            'answer' => 'From 2019 through 2022, the report records 560 women hired.',

            'source' => 'WePOWER Progress Report 2022, p. 30',
        ],

        [
            'id' => 'cumulative_interns_2019_2022',
            'match' => [
                'contains' => [
                    'cumulative interns',
                    'interns from 2019 to 2022',
                    '1325 interns',
                    '1 325 interns',
                ],
            ],

            'answer' => 'From 2019 through 2022, the report records 1,325 female student interns hired.',

            'source' => 'WePOWER Progress Report 2022, p. 30',
        ],

        [
            'id' => 'cumulative_mentees_2019_2022',
            'match' => [
                'contains' => [
                    'cumulative mentees',
                    'mentees from 2019 to 2022',
                    '897 mentees',
                    '113 mentors',
                ],
            ],

            'answer' => 'From 2019 through 2022, 897 mentees were supported by 113 mentors.',

            'source' => 'WePOWER Progress Report 2022, p. 30',
        ],

        [
            'id' => 'cumulative_stem_2019_2022',
            'match' => [
                'contains' => [
                    'cumulative stem',
                    'stem from 2019 to 2022',
                    '25877 female students',
                    '25 877 female students',
                ],
            ],

            'answer' => 'From 2019 through 2022, the report records 144 STEM outreach workshops with 25,877 female student participants.',

            'source' => 'WePOWER Progress Report 2022, p. 30',
        ],

        [
            'id' => 'cumulative_training_2019_2022',
            'match' => [
                'contains' => [
                    'cumulative training',
                    'training from 2019 to 2022',
                    '25836 female professionals',
                    '25 836 female professionals',
                    '594 workshops',
                ],
            ],

            'answer' => 'From 2019 through 2022, 25,836 female professionals participated in 594 workshops or trainings.',

            'source' => 'WePOWER Progress Report 2022, p. 30',
        ],

        [
            'id' => 'cumulative_facilities_2019_2022',
            'match' => [
                'contains' => [
                    'cumulative women friendly facilities',
                    'cumulative women-friendly facilities',
                    '332 facilities',
                ],
            ],

            'answer' => 'From 2019 through 2022, the report records 332 women-friendly facilities or services built or provided.',

            'source' => 'WePOWER Progress Report 2022, p. 30',
        ],


        /*
        |--------------------------------------------------------------------------
        | 2022 HIGHLIGHTS
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'highest_beneficiaries_2022',
            'match' => [
                'contains' => [
                    'highest beneficiaries in 2022',
                    'most beneficiaries in 2022',
                    'which partner reached the most beneficiaries',
                ],
            ],

            'answer' => 'Among the 2022 Partners highlighted in the report, Tata Power DDL reached the highest number of female beneficiaries, with 12,206.',

            'source' => 'WePOWER Progress Report 2022, p. 23',
        ],

        [
            'id' => 'top_recruiters_2022',
            'match' => [
                'contains' => [
                    'highest women recruitment in 2022',
                    'top recruiter women 2022',
                    'most women professionals recruited',
                    'who recruited the most women',
                ],
            ],

            'answer' => 'The 2022 report says NEA recruited the highest number of women professionals, with 102, followed by WAPDA with 68 and POWERGRID with 50.',

            'source' => 'WePOWER Progress Report 2022, p. 23',
        ],

        [
            'id' => 'top_intern_recruiters_2022',
            'match' => [
                'contains' => [
                    'highest interns in 2022',
                    'most female interns',
                    'who recruited the most interns',
                    'top intern recruiter',
                ],
            ],

            'answer' => 'The 2022 report says WAPDA recruited the highest number of female interns, with 107, followed by NPTI with 74 and MEPCO with 68.',

            'source' => 'WePOWER Progress Report 2022, p. 23',
        ],

        [
            'id' => 'new_partners_2022',
            'match' => [
                'contains' => [
                    'new partners in 2022',
                    'seven new partners',
                    '7 new partners',
                    'who joined wepower in 2022',
                ],
            ],

            'answer' => 'Seven new Partners joined the network in 2022: NACEUN, Nepal Electricity Authority (NEA), BSES Rajdhani Power Limited (BRPL), Institute of Engineering (IOE), BSES Yamuna Power Limited (BYPL), Multan Electric Power Company (MEPCO), and National Power Training Institute (NPTI).',

            'source' => 'WePOWER Progress Report 2022',
        ],

        [
            'id' => 'internship_module',
            'match' => [
                'contains' => [
                    'wepower internship module',
                    'internship module',
                ],
            ],

            'answer' => 'The WePOWER Internship Module was developed as a resource for the South Asian energy sector through consultations with a working group of nine WePOWER Partners, with guidance from IEEE Women in Engineering professors and HR experts.',

            'source' => 'WePOWER Progress Report 2022, Box A',
        ],


        /*
        |--------------------------------------------------------------------------
        | WePOWER ASSESSMENT 2024–25
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'assessment_2024_25',
            'match' => [
                'contains' => [
                    'wepower assessment 2024 25',
                    '2024 25 assessment',
                    '2024/25 assessment',
                    'women s jobs in the south asia power sector',
                    'wepower assessment',
                ],
            ],

            'answer' => 'The WePOWER Assessment 2024–25, “Women’s Jobs in the South Asia Power Sector,” examines women’s employment and workplace experiences using quantitative and qualitative evidence from power-sector organizations across South Asia.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'assessment_sample',
            'match' => [
                'contains' => [
                    'assessment sample',
                    'how many surveys',
                    'how many utilities',
                    'how many interviews',
                    'how many people were interviewed',
                    '871 individuals',
                    '171 discussions',
                    '200 hours of interviews',
                ],
            ],

            'answer' => 'The assessment draws on data and insights from more than 30 power-sector utilities, more than 2,000 employee surveys, and over 200 hours of interviews involving 871 individuals in 171 individual and group discussions.',

            'source' => 'WePOWER Assessment 2024–25, Introduction',
        ],

        [
            'id' => 'network_stakeholders',
            'match' => [
                'contains' => [
                    'how many stakeholders',
                    'wepower stakeholders',
                    'more than 60 stakeholders',
                    '60 power sector stakeholders',
                ],
            ],

            'answer' => 'The 2024–25 assessment states that the WePOWER Network comprises more than 60 power-sector stakeholders, including public and private utilities, professional associations, and technical universities.',

            'source' => 'WePOWER Assessment 2024–25, Introduction',
        ],

        [
            'id' => 'representation_ranges',
            'match' => [
                'contains' => [
                    'women representation range',
                    'female representation range',
                    'representation in 2024 25',
                    'technical staff range',
                    'managerial staff range',
                ],
            ],

            'answer' => 'Across South Asia in the 2024–25 survey, women represented 3.7%–24.4% of total staff, 0.3%–21.6% of technical staff, and about 6%–30% of managerial staff, depending on the country.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'highest_representation_bhutan',
            'match' => [
                'contains' => [
                    'highest women representation',
                    'highest female representation',
                    'which country has the highest representation',
                    'bhutan highest representation',
                ],
            ],

            'answer' => 'In the 2024–25 survey findings, Bhutan recorded the highest percentage of women across total staff, technical staff, and managerial roles among the countries surveyed.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'lowest_overall_pakistan',
            'match' => [
                'contains' => [
                    'lowest overall women representation',
                    'lowest female representation overall',
                    'pakistan 3 7 percent',
                    'pakistan 3.7 percent',
                ],
            ],

            'answer' => 'In the 2024–25 survey findings, Pakistan had the lowest overall percentage of women, at 3.7%.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'lowest_technical_maldives',
            'match' => [
                'contains' => [
                    'lowest technical women',
                    'lowest women in technical roles',
                    'maldives 0 3 percent',
                    'maldives 0.3 percent',
                ],
            ],

            'answer' => 'In the 2024–25 survey findings, the Maldives had the lowest percentage of women in technical roles, at 0.3%.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'managerial_representation',
            'match' => [
                'contains' => [
                    'women in managerial roles',
                    'female managers 2024 25',
                    'managerial representation',
                    'women managers by country',
                ],
            ],

            'answer' => 'The 2024–25 assessment reports wide variation in women’s managerial representation: Bhutan was close to 30%, Sri Lanka about 24%, Nepal about 13%, while Bangladesh, India, and Pakistan were around 6%–7%.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'women_hired_2022_2024',
            'match' => [
                'contains' => [
                    'women hired between 2022 and 2024',
                    'women recruited between 2022 and 2024',
                    '1537 women',
                    '1 537 women',
                    '478 technical',
                    '560 non technical',
                ],
            ],

            'answer' => 'Between 2022 and 2024, surveyed organizations hired 1,537 women, around 10% of all new hires. The assessment identifies 478 in technical roles and 560 in non-technical roles.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'promotions_2024_25',
            'match' => [
                'contains' => [
                    'women promotions',
                    'female promotions',
                    'promotion opportunities',
                    '6 percent promotions',
                    '4 percent technical promotions',
                ],
            ],

            'answer' => 'The 2024–25 assessment reports that women accounted for 6% of staff promotions and 4% of promotions in technical roles.',

            'source' => 'WePOWER Assessment 2024–25',
        ],


        /*
        |--------------------------------------------------------------------------
        | BARRIERS FOR WOMEN
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'main_barriers',
            'match' => [
                'contains' => [
                    'main barriers for women',
                    'barriers to women',
                    'barriers for women',
                    'challenges for women',
                    '29 percent caregiving',
                    '27 percent field',
                    '16 percent harassment',
                ],
            ],

            'answer' => 'The assessment identifies three frequently discussed barriers to women’s career progression: the dual burden of work and caregiving responsibilities (29%), demanding technical or field assignments involving travel (27%), and inadequate protection against harassment and safety concerns (16%).',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'caregiving_barrier',
            'match' => [
                'contains' => [
                    'caregiving barrier',
                    'work and caregiving',
                    'dual burden',
                    '29 percent barrier',
                ],
            ],

            'answer' => 'Caregiving was the most frequently cited barrier in the assessment: the dual burden of paid work and responsibilities at home accounted for 29% of the coded barrier discussion.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'fieldwork_barrier',
            'match' => [
                'contains' => [
                    'fieldwork barrier',
                    'technical field assignments',
                    'field assignments barrier',
                    '27 percent barrier',
                ],
            ],

            'answer' => 'The assessment identifies technical and field assignments requiring travel, irregular hours, or physically demanding work as a major barrier, accounting for 27% of the coded barrier discussion.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'safety_barrier',
            'match' => [
                'contains' => [
                    'safety barrier',
                    'harassment barrier',
                    'safety and harassment',
                    'safe transport barrier',
                    'secure accommodation women',
                ],
            ],

            'answer' => 'Safety and harassment concerns are a major barrier in the assessment, including insecure field environments and gaps in safe transport and accommodation.',

            'source' => 'WePOWER Assessment 2024–25',
        ],


        /*
        |--------------------------------------------------------------------------
        | WORKPLACE SAFETY & POLICIES
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'gbv_harassment_policies',
            'match' => [
                'contains' => [
                    '87 percent policies',
                    'gender based violence policies',
                    'sexual harassment policies',
                    'gbv policies',
                ],
            ],

            'answer' => 'The assessment reports that 87% of surveyed organizations had policies to prevent gender-based violence and/or sexual harassment.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'complaints_committee',
            'match' => [
                'contains' => [
                    '71 percent complaints',
                    'complaints committee',
                    'designated focal person',
                ],
            ],

            'answer' => 'The assessment reports that 71% of surveyed organizations had a complaints committee or designated focal person.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'formal_grievance_procedures',
            'match' => [
                'contains' => [
                    '66 percent grievance',
                    'formal grievance procedures',
                    'grievance procedures',
                ],
            ],

            'answer' => 'The assessment reports that 66% of surveyed organizations had formal grievance procedures.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'transport_services',
            'match' => [
                'contains' => [
                    'transport facilities for women',
                    'transport services women',
                    '59 percent transport',
                    '60 percent project site transport',
                    '57 percent after hours',
                ],
            ],

            'answer' => 'Among surveyed utilities, 59% offered transport for women to or from offices, 60% to or from project sites, and 57% after official hours from office to home.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'lodging_facilities',
            'match' => [
                'contains' => [
                    'separate lodging',
                    'hostel facilities',
                    '50 percent lodging',
                ],
            ],

            'answer' => 'The assessment reports that 50% of responding utilities offered separate lodging or hostel facilities for men and women outside headquarters.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'gender_sensitization_training',
            'match' => [
                'contains' => [
                    'gender sensitization training',
                    '36 percent utilities',
                    '90 percent participants were men',
                    'anti discrimination training',
                ],
            ],

            'answer' => 'The assessment reports that 36% of utilities, mainly in India and Pakistan, held gender sensitization, anti-sexual-harassment, or anti-discrimination training; approximately 90% of participants in those trainings were men.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'field_office_gender',
            'match' => [
                'contains' => [
                    'women in field offices',
                    'men in field offices',
                    '16 percent women field offices',
                    '45 percent men field offices',
                ],
            ],

            'answer' => 'Among surveyed respondents, 16% of women were based in field offices compared with 45% of men; almost half of the women respondents were based at head office or headquarters.',

            'source' => 'WePOWER Assessment 2024–25',
        ],


        /*
        |--------------------------------------------------------------------------
        | COUNTRY PROGRESS
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'overall_progress_2020_2024',
            'match' => [
                'contains' => [
                    'progress since 2020',
                    '13670 to 15713',
                    '13 670 to 15 713',
                    '9 percent to 9 3 percent',
                    'overall employment of women rose',
                ],
            ],

            'answer' => 'Among utilities participating in both the baseline and later assessment, the total number of women increased from 13,670 to 15,713, and women’s overall employment share rose from 9% to 9.3%.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'bhutan_progress',
            'match' => [
                'contains' => [
                    'bhutan technical women',
                    'bhutan progress women',
                    '21 6 percent bhutan',
                    '16 1 percent bhutan',
                    '389 to 489',
                ],
            ],

            'answer' => 'The assessment reports that women made up 21.6% of technical staff in Bhutan, up from 16.1% in 2020, with the number increasing from 389 to 489.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'nepal_progress',
            'match' => [
                'contains' => [
                    'nepal progress women',
                    'nepal electricity authority women',
                    '12 6 to 17 5',
                    'technical women nepal 6 to 10',
                    '351 to 558',
                ],
            ],

            'answer' => 'For Nepal Electricity Authority, the assessment reports women’s overall share rising from 12.6% to 17.5%, while the share of technical women rose from 6% to 10%, with the technical count increasing from 351 to 558.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'india_progress',
            'match' => [
                'contains' => [
                    'india female participation',
                    'india progress women',
                    'ntpc women',
                    '1363 women',
                    '614 female engineers',
                ],
            ],

            'answer' => 'The assessment reports that India’s female participation increased from 8% to 9.8%. It also notes that NTPC employed 1,363 women out of 18,163 staff, including 614 female engineers among 14,609 technical employees.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'sri_lanka_progress',
            'match' => [
                'contains' => [
                    'sri lanka female share',
                    'sri lanka progress women',
                    '12 7 to 14 7',
                    '14 7 to 14 9',
                ],
            ],

            'answer' => 'The assessment reports Sri Lanka’s overall female share increasing from 12.7% to 14.7%, while the technical share changed only slightly, from 14.7% to 14.9%.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'pakistan_progress',
            'match' => [
                'contains' => [
                    'pakistan technical women',
                    'pakistan progress women',
                    '381 to 689',
                    '4 8 to 3 5',
                ],
            ],

            'answer' => 'The assessment reports that Pakistan nearly doubled the number of women in technical roles from 381 to 689, while their share fell from 4.8% to 3.5% because overall workforce recruitment grew faster.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'bangladesh_progress',
            'match' => [
                'contains' => [
                    'bangladesh progress women',
                    'bangladesh women representation',
                    '9 5 to 6 2',
                    '3 1 to 2 4',
                    'bangladesh workforce grew',
                ],
            ],

            'answer' => 'The assessment reports that Bangladesh’s total workforce grew by 20%, while women’s overall representation fell from 9.5% to 6.2% and their share of technical staff fell from 3.1% to 2.4%.',

            'source' => 'WePOWER Assessment 2024–25',
        ],


        /*
        |--------------------------------------------------------------------------
        | IMPACT & RECOMMENDATIONS
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'changing_social_norms',
            'match' => [
                'contains' => [
                    'changing social norms',
                    'gender norms improving',
                    'social norms improved',
                    'women visibility in sector',
                    'women accepted as engineers',
                ],
            ],

            'answer' => 'The assessment finds broad improvement in social norms and women’s visibility in the sector, while persistent gender biases continue to affect women’s career progression.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'recommendations_childcare',
            'match' => [
                'contains' => [
                    'recommendations childcare',
                    'childcare support',
                    'daycare recommendation',
                    'flexible work recommendation',
                    'flexible work arrangements',
                ],
            ],

            'answer' => 'The assessment recommends stronger childcare support through measures such as flexible work arrangements, leave options, and facilities or services, together with improved HR policies and training.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'recommendations_outreach',
            'match' => [
                'contains' => [
                    'expand wepower outreach',
                    'recommendations outreach',
                    'rural outreach',
                    'non technical staff wepower',
                    'involve men wepower',
                ],
            ],

            'answer' => 'The assessment recommends expanding WePOWER outreach beyond main offices and technical staff, including greater engagement with non-technical staff, people outside major cities and in rural areas, and men as well as women.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'recommendations_joint_training',
            'match' => [
                'contains' => [
                    'joint training men and women',
                    'unconscious bias training',
                    'training both men and women',
                    'gender sensitization recommendation',
                ],
            ],

            'answer' => 'The assessment highlights joint training for women and men, including gender-sensitization and unconscious-bias training, as important for strengthening workplace inclusion and mutual respect.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'recommendations_safety',
            'match' => [
                'contains' => [
                    'safety recommendations',
                    'safe transport recommendation',
                    'secure accommodation recommendation',
                    'grievance mechanism recommendation',
                ],
            ],

            'answer' => 'The assessment recommends improved workplace safety, secure transport and accommodation for field roles, and clearer, more transparent grievance and sexual-harassment mechanisms.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'wepower_impact_2024_25',
            'match' => [
                'contains' => [
                    'wepower impact',
                    'impact of wepower',
                    'how has wepower helped',
                    'what impact has wepower made',
                ],
            ],

            'answer' => 'The assessment says WePOWER has helped Partners advance gender equity through its Five Pillar Framework, knowledge exchange, data and target setting, and sharing of good practices. It also notes examples such as gender policies, on-site daycare, flexible work arrangements, and improved fieldwork and training opportunities.',

            'source' => 'WePOWER Assessment 2024–25',
        ],

        [
            'id' => 'sar100_shokti_konna',
            'match' => [
                'contains' => [
                    'sar100',
                    'shokti konna',
                    'shoktikonna',
                ],
            ],

            'answer' => 'The 2024–25 assessment cites SAR100 and Shokti Konna as examples of expanded training and knowledge-sharing opportunities associated with WePOWER’s convening role.',

            'source' => 'WePOWER Assessment 2024–25',
        ],


        /*
        |--------------------------------------------------------------------------
        | RESTRICTED / INTERNAL INFORMATION
        |--------------------------------------------------------------------------
        */

        [
            'id' => 'official_use_only',
            'match' => [
                'contains' => [
                    'official use only document',
                    'restricted document',
                    'internal project document',
                ],
            ],

            'answer' => 'I can’t provide material marked for official or restricted use through the public chatbot.',
        ],

    ],

];
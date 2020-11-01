<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Proposal PDF Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Proposal PDF.
    |
    */

    'pdf' => [
        /** Company data */
        'company_details'   => [
            'company_name'      => 'HNB ASSURANCE PLC',
            'company_reg_no'    => '(PQ108)',
            'company_add'       => '3rd Floor, Iceland Business Centre, Sri Uththarananda Mawatha, Colombo 03',
        ],
        /** Signature pad */
        'signature'         => [
            'sig_life_assured'  => 'Signature of Life to be assured',
            'sig_spouse'        => 'Signature of spouse',
        ],
        /** Cover page data */
        'cover_page' => [
            'title' => 'PROPOSAL FOR LIFE INSURANCE',
            'paragraph_1' => [
                'para_1_1' => 'We thank you for trusting HNB Assurance with your Life insurance.',
                'para_1_2' => 'The information you provide in this form makes the basis of the insurance contract.',
                'para_1_3' => 'Therefore, it is your duty to declare all information to the best of your knowledge and belief.',
            ],
            'paragraph_2' => [
                'para_2_1' => 'Providing the information yourself will minimize the disputes at claim settlements.',
                'para_2_2' => 'We have introduced several products according to your specific requirements.',
                'para_2_3' => 'You can select a suitable product to cater to your needs.',
                'para_2_4' => 'We advise you to discuss your needs with our insurance advisor in order to select the most appropriate product.',
            ],
            'paragraph_3' => [
                'para_3_1' => 'Premium payable for life insurance depend on your health condition, age, sum assured and occupation.',
                'para_3_2' => 'It is important that the premium is affordable for you to continue the long term relationship with HNB Assurance PLC.',
            ],
            'paragraph_4' => [
                'para_4_1' => 'If medical investigations are required for the cover you apply,',
                'para_4_2' => 'Please do them as soon as possible for us to expedite the process of considering your proposal.',
            ],
            'paragraph_5' => [
                'para_5_1' => 'Answer all questions fully to the best of your knowledge and belief.',
                'para_5_2' => 'Benefits under the policy may not be payable in the event of non-disclosure or misrepresentation of material facts.',
                'para_5_3' => 'If you are in doubt about the relevance of certain facts, it is in your interest to disclose them.',
            ],
            /** Language and correspondence preference, assurance code, proposal no, type data */
            'lang_correspondence' => [
                'lang_corres_pref'  => 'Language and correspondence preference',
                'assurance_code'    => 'Assurance code',
                'proposal_no'       => 'Proposal No',
                'type'              => 'Type',
            ],
        ],

        /** 01.Personal Details Widget - Assured and spouse */
        'personal_details_widget_01' => [
            'title'             => '01. Personal Details',
            'sub_title_1'       => 'Life to be Assured',
            'sub_title_2'       => 'Spouse',
            'first_name'        => 'First Name',
            'middle_name'       => 'Middle Name',
            'last_name'         => 'Last Name',
            'permanent_add'     => 'Permanent Address',
            'city'              => 'City',
            'postal_code'       => 'Postal Code',
            'residence_no'      => 'Residence No',
            'mobile'            => 'Mobile',
            'email'             => 'Email',
            'nic'               => 'NIC',
            'date_of_birth'     => 'Date of Birth',
            'nationality'       => 'Nationality',
            'sex'               => 'Sex',
            'civil_status'      => 'Civil Status',
            'country_of_residence'      => 'Country of Residence',
            'country_of_perm_residence' => 'Country of Permanent Residence',
            'other_citizenship'         => 'Other Citizenship/PR',
            'monthly_income'            => 'Monthly income(Rs.)',
            'occupation'                => 'Occupation',
            'nature_of_duties'          => 'Nature of duties',
            'name_and_add_of_employer'  => 'Name and the address of employer',
            'office_no'                 => 'Office No',
            /** Personal details questionnaire  */
            'q_title'   => 'Does your occupation require the followings ?',
            'q_a'       => 'a. Working on heights above 40 feet',
            'q_b'       => 'b. Working with heavy/sharp machinery/Working with chemicals',
            'q_c'       => 'c. Electrical work in high voltage environment',
            'q_d'       => 'd. Welding and/or spray painting',
            'q_e'       => 'e. Any other hazardous work (Specify)',
        ],

        /** 02. Nominee Details */
        'nominee_widget_02' => [
            'title'         => '02. Nominees',
            'not_provided'  => 'NOT PROVIDED',
            'nominee_info'  => [
                'name_in_full'      => 'Name in Full',
                'nic'               => 'NIC No',
                'rel_life_assured'  => 'Relationship to life Assured',
                'percentage'        => 'Percentage(%)',
                'date_of_birth'     => 'Date of Birth',
            ],
            'guardian_info' => [
                'title'             => 'If the nominee is a minor, his/her guardian\'s name',
                'age'               => 'Age',
                'rel_to_nominee'    => 'Relationship to Nominee',
                'nic'               => 'NIC No',
            ],
        ],

        /** 03. Present State Of Health */
        'present_state_of_health_widget_03' => [
            'title'             => '03. Present State Of Health',
            'q_title'           => 'Do you have any health complications ? If “Yes“, Give details',
            'sub_title_assured' => 'Assured',
            'sub_title_1'       => 'Life to be Assured',
            'sub_title_2'       => 'Spouse',
            'height'            => 'Height',
            'weight'            => 'Weight',
        ],
        /** 04. Details Of Health */
        'details_of_health_widget_04' => [
            'title'             => '04. Details of Health',
            'q_title'           => 'Have you ever had ,or are you at present ailing from any If “yes” please give details of disease, name and address of doctor who treated you, E.C.G.X-RAY, Ultra sound, Diagnosis card, Histology(biopsy)',
            'sub_title_assured' => 'Assured',
            'sub_title_spouse'  => 'Spouse',
            'q_a' => 'a. Disease of eyes, ears, nose or throat ?',
            'q_b' => 'b. Giddiness,Epileptic or other fits, Polio or any mental illness or paralysis or Multiple Sclerosis or coma or nervous system disorders ?',
            'q_c' => 'c. Spitting blood, chronic cough, pleurisy, Tuberculosis, Bronchitis, Asthma, chronic lung disease or any other disease of the lungs ?',
            'q_d' => 'd. Heart disease, stroke, blood pressure, chest pain on exertion or primary pulmonary arterial hypertension ?',
            'q_e' => 'e. Cancer, carbuncle, tumour, cyst, leprosy, or any other malignancy ?',
            'q_f' => 'f. Jaundice, gall bladder or pancreas disease, piles, fistula or any other stricture ?',
            'q_g' => 'g. Chronic indigestion, chronic diarrhoea or abdominal pain ?',
            'q_h' => 'h. Gastrointestinal or urinary disease ?',
            'q_i' => 'i. Gout, rheumatic fever, thyroid gland or hormonal disturbances, rheumatism or arthritis or muscular dystrophy ?',
            'q_j' => 'j. Rupture or hernia?',
            'q_k' => 'k. Diabetes, fulminant hepatitis, kidney failure or any other kidney or liver disease?',
            'q_l' => 'l. Gonorrhoea, syphilis, AIDS or any other sexually transmitted disease ?',
            'q_m' => 'm. Alcohol or drugs related illnesses ?',
            'q_n' => 'n. Hereditary illnesses ?',
            'q_o' => 'o. Any disability or deformity or serious illness or disease not mentioned herein ?',
        ],

        /** 05. Accidents, Operation, Examination etc */
        'acc_op_ex_widget_05' => [
            'title'             => '05. Accidents, Operation, Examination etc',
            'q_title'           => 'If you have answer “yes” to any of the bellow, Please give details and forward report available for perusal.',
            'sub_title_assured' => 'Assured',
            'sub_title_spouse'  => 'Spouse',
            'q_a' => 'a.Have you ever lost/extracted 10 or more teeth ? If so, are you wearing a well fitting denture and for how many teeth ?',
            'q_b' => 'b.Have you ever had any serious accident or had any injury ?',
            'q_c' => 'c.Have you ever been taken any X-ray, ECG or Fluoroscopic examination or advice to get done ?',
            'q_d' => 'd.Have you ever been done blood test or advice to get done ?',
            'q_e' => 'e.Have you undergone any medical investigations or surgery? Are you presently on investigation recommend to get done ?',
            'q_f' => 'f.Have you ever been examined, treated or operated in a hospital, nursing home, clinic, ayurveda center ?',
            'q_g' => 'g.Have you passed sugar, blood, pus or albumin in urine ?',
            'q_h' => 'h.Have you ever been done Any genetic testing? or advised to get done ?',
        ],

        /** 06. For Female Applicable Only */
        'female_applicable_widget_06' => [
            'title'                     => '06. For Female Applicable Only',
            'q_a'                       => 'a. Are you pregnant at present?',
            'q_a_exp_date_of_delivery'  => 'Expected date of delivery',
            'q_a_how_many_months'       => 'How many months?',
            'q_b' => 'b. Have you ever had or do you have any gynecological complications?',
        ],

        /** 07. Names, Address and Telephone Numbers of your Family Doctor/Physician/Surgeon */
        'doctor_details_widget_07' => [
            'title'                     => '07. Names, Address and Telephone Numbers of your Family Doctor/Physician/Surgeon',
            'sub_title_life_assured'    => 'Life to be Assured',
            'sub_title_assured'         => 'Assured',
            'sub_title_spouse'          => 'Spouse',
            'date_of_last_consultation' => 'Date of last Consultation',
            'reason_for_consultation'   => 'Reason for Consultation',
        ],

        /** 08. Family Information of the Life to be Assured and Spouse */
        'family_info_widget_08' => [
            'title'                     => '08. Family Information of the Life to be Assured and Spouse',
            'q_title'                   => 'If Living – indicate the present State of Health including and illness(es) suffering from',
            'q_title_2'                 => 'If Deceased – indicate Age at the time of Death and Cause of Death (give details as whether death occurred due to an accident, sickness or natural cause)',
            'sub_title_life_assured'    => 'Life to be Assured',
            'sub_title_spouse'          => 'Spouse',
            'if_alive'                  => 'If alive',
            'if_dead'                   => 'If dead',
            'relationship'              => 'Relationship',
            'age'                       => 'Age',
            'state_of_health'           => 'State of health',
            'age_of_death'              => 'Age at Death',
            'cause_of_death'            => 'Cause of death',
            'father'                    => 'Father',
            'mother'                    => 'Mother',
            'other'                     => 'Other',
        ],

        /** 09. Health Condition Questions */
        'HealthConditionQuestionList' => [
            'BodilyDeformities'         => '1. Have you had any bodily deformities ?',
            'MedicalTreatmentOperation' => '2. Have you currently or at any time suffered from any illnesses or had any medical treatment or operation ?',
            'Hospitalized'              => '3. Have you ever undergone surgery or are you awaiting surgery or been hospitalized in the last 2 years ?',
            'HeartAttack'               => '4. Have you ever had a heart attack, chest pain, a stroke, hypertension, hyperlipideamia, diabetes or any disorder of the heart blood vessels ?',
            'Diabetes'                  => '5. Are you on treatment for Diabetes ?',
            'TumorCancer'               => '6. Have you ever had any form or type of tumor or cancer ?',
            'Arthritis'                 => '7. Have you ever had any disorder or disease of the muscles, bones, joints, limbs or spine (including arthritis, rheumatism etc) ?',
            'NeurologicalDisorder'      => '8. Have you ever had any anxiety state, depression or any mental, nervous or neurological disorder ?',
            'Tuberculosis'              => '9. Have you ever suffered from respiratory or lung trouble (Eg. asthma, bronchitis, persistent cough, tuberculosis) ?',
            'StomachDisorder'           => '10. Have you ever suffered from any disorder of the stomach, intestine, digestive system, gallbladder or liver (Eg: actual or suspected gastritis or duodenal ulcer, bleeding from the bowel, recurrent indigestion, hepatitis, gallstones, hiatus hernia) ?',
            'KidneyDisorder'            => '11. Have you ever suffered from any disease, disorder or infection of the kidneys, bladder or reproductive organs (Eg. albumin in urine, stones, prostatitis, venereal disease) ?',
            'DiseaseThroat'             => '12. Have you ever suffered from diseases of the eyes, ears, nose, mouth and throat ?',
            'AIDS'                      => '13. Have you ever received (or expected to receive) any medical advice, blood test or other tests in connection with AIDS, AIDS related condition ?',
            'BloodDisorder'             => '14. Have you ever suffered from any disorders of the blood (Eg. hemophilia, anemia) ?',
            'SexualDisease'             => '15. Have you ever suffered from hepatitis or any sexually transmitted diseases ?',
            'AnyOtherIllness'           => '16. Have you ever suffered from any illness or disorder which is not mentioned above ?',
            'OperatedHospital'          => '17. Have you ever been examined, treated or operated in a hospital, nursing home, clinic, Ayurvedic centre or sanatorium ?',
            'NervousSystem'             => '18. Have you ever suffered from paralysis, coma, fits or any other diseases or disorders of the nervous system ?',
            'SkinJointsDisorder'        => '19. Have you ever suffered from diseases or disorders of the skin, muscles, bones or joints ?',
            'FamilyIllness'             => '20. Has anyone in the family had any disease or illness in the past three months ? If so, please give details.',
        ],

        /** 09. Health Condition Questions */
        'SpecialRiskQuestionList' => [
            'SpcRiskCriminalProceeding' => '21. Have you been convicted of any criminal proceeding instituted and/or pending against you ?',
            'SpcRiskLifeThreat'         => '22. Have you  have or had any kind of threat on your life ?',
            'SpcRiskFamilyThreat'       => '23. Have your immediate family members ever had any kind of threats ? If `YES` Please give details',
            'SpcRiskAlcohol'            => '24. Do you consume alcohol ? If so, Please state quantity consumed for a week ?',
            'SpcRiskSmoke'              => '25. Do you smoke ? If so, Please state how many sticks per day ?',
        ],

        /** 09. Hobbies and Pastimes Questions */
        'HazardousQuestionList' => [
            'HazSportsActivity' => 'Have you ever participated (or anticipate doing so) in any hazardous sport or activity ? If `YES`, give details',
        ],

        /** 10. Information Regarding Hazardous Occupation, Pursuit etc */
        'hazardous_occ_widget_10' => [
            'title'             => '10. Information Regarding Hazardous Occupation, Pursuit etc',
            'sub_title_assured' => 'Assured',
            'sub_title_spouse'  => 'Spouse',
            'q_a' => 'a.Do you engage in any hazardous occupation/pursuit ?',
            'q_b' => 'b.Have you any intention of engaging in any hazardous sports or activity ?',
            'q_c' => 'c.Do you engage in police or military service or have you any intention to engage in police or military service ?',
            'q_d' => 'd.Do you currently engage or have you any intention to engage in political activities ?',
        ],

        /** 11. Details of Special Risks */
        'details_special_risks_widget_11' => [
            'title'             => '11. Details of Special Risks',
            'sub_title_assured' => 'Assured',
            'sub_title_spouse'  => 'Spouse',
            'q_a' => 'a.Do you or any of your family members have or ever had any kind of threat on your life/their live ?',
            'q_b' => 'b.Have you ever been convicted of any special risks or illegal activity ?',
            'q_c' => 'c.Is there any case pending or under investigation against you ?',
            'q_d' => 'd.If you engage in security services, do you have to use weapons according to the nature of your occupation ?',
        ],

        /** 12. Particulars of Previous life Policies/Proposals */
        'previous_policies_widget_12' => [
            'title'                     => '12. Particulars of Previous life Policies/Proposals',
            'sub_title_life_assured'    => 'Life to be assured',
            'sub_title_assured'         => 'Assured',
            'sub_title_spouse'          => 'Spouse',
            'name_of_insurance_company' => 'Name of Insurance Company',
            'policy_proposal_number'    => 'Policy /Proposal Number',
            'sum_assured'               => 'Sum Assured',
            'plan_of_insurance'         => 'Plan of Insurance',
            'whether_in_force'          => 'Whether in force ?',
            'sub_title_q'               => 'Has your application for Life, accident, disability or Health Assurance ever been declined or postponed or accepted on special terms ?',
        ],

        /** 13. Benefits Required */
        'benefits_widget_13' => [
            'title'                     => '13. Benefits Required',
            'sub_title_life_assured'    => 'Life to be assured',
            'sub_title_assured'         => 'Assured',
            'sub_title_spouse'          => 'Spouse',
            'type_of_policy'            => 'Type of Policy',
            'policy_term'               => 'Term(Years)',
            'basic_sum_assured'         => 'Basic Sum/Assured',
            'covers_cease_age_note'     => 'For Life to be Assured and Spouse additional covers No.(2)(3)(4)(5)(6)(7)(8) and (9) Cease at age 65 years.',
            'additional_benefits'       => 'Additional Benefits',
            'sum_assured'   => 'Sum Assured',
            /** Riders list */
            'AD-LIFE'       => '(1)Additional Life Cover',
            'ACC-DTH'       => '(2)Accidental Death Benefit (***)',
            'TPD'           => '(3)Total Permanent Disability (**)',
            'PPD'           => '(4)Partial Permanent Disability (**)',
            'CRIT-IL-29'    => '(5)Critical Illness Benefit',
            'HOS-BEN'       => '(6)Hospital Benefit(Per Day)',
            'SUR-BEN'       => '(7)Surgery Benefit',
            'MED-REM3'      => '(8)Medical Reimbursement Benefit',
            'MIB'           => '(9)Family Income Benefit',
            'CANCER'        => 'Cancer Rider Benefit',
            'WOP-DTH-B'     => 'Waiver of Basic Premium due to death of Life Assured',
            'WOP-DTH-R'     => 'Waiver of Spouse & Children\'s Rider Premium due to death of Life Assured',
            'WOP-TPD-B'     => 'Waiver of Basic Premium due to total permanent disability of Life Assured',
            'WOP-TPD-R'     => 'Waiver of Insured\'s additional life,Critical Illness Rider, Spouse and Children\'s Rider Premium due to total permanent disability of Life Assured',
            /** ToDo : Need info */
            'araksha_rider_benefit'     => 'Araksha Rider Benefit',
            'araksha_annuity_benefit'   => 'Araksha Annuity Benefit',
            'no_of_araksha_prot_blocks' => 'Number of Araksha Protection blocks',
            'age_entry_note'            => 'If age at entry is less than 55 years only 50% of the benefit with be paid for angioplasty subject to maximum Rs.1,000,000/-. Maximum limit that can be obtained from all insurance companies is Rs. 30,000,000/-(**), Rs. 50,000,000(***)',
            'age'                   => 'Age',
            'hospital_benefit'      => 'Hospital Benefit',
            'critical_illness'      => 'Critical illness',
            'surgery_benefit'       => 'Surgery Benefit',
            'reimbursement_benefit' => 'Reimb. Benefit',
            'benefit_for_children'  => 'Benefit for Children',
            'child_1'   => '1st Child',
            'child_2'   => '2nd Child',
            'child_3'   => '3rd Child',
            'child_4'   => '4th Child',
            'my_fund_add_blocks_reguir' => 'Number of Additional blocks require',
            'premium_paying_term'       => 'Premium Paying Term',
            'max_limits_wording'        => 'Hospital Benefit for child Rs.10,000.00. Maximum Critical benefit/Medical reimbursement Benefit for child Rs.1,000,000.00',
        ],

        /** 14. Method of Premium Payment */
        'method_of_prem_payment_widget_14' => [
            'title'                     => '14. Method of Premium Payment',
            'method_of_premium_payment' => 'Method of premium Payment',
            'if_you_have_a_bank_acc'    => 'a.If you have a bank account to deposit company cheques, Please mention the Bank Name and the account number',
            'bank_name'                 => 'Bank Name',
            'account_no'                => 'Account Number',
            'do_you_wish_to_open_hnb'   => 'b.Do you wish to open a HNB bank account for above?',
        ],

        /** CHILD INFORMATION */

        /** 01. Child's Personal Details */
        'child_widget' => [
            'title'             => '01. Child`s Personal Details',
            'first_name'        => 'First Name',
            'middle_name'       => 'Middle Name',
            'last_name'         => 'Last Name',
            'sex'               => 'Sex',
            'dob'               => 'Date of Birth',
            'place_of_birth'    => 'Place of Birth',
            'rel_to_proposer'   => 'Relationship to the proposer/ Insured',
            'child_exact_height'=> 'What is the child exact Height',
            'weight'            => 'Weight',
            'hospital_benefit'  => 'Hospital Benefit(Per day)',
            'crit_ill_benefit'  => 'Juvenile Critical illness Benefit',
            'surgery_benefit'   => 'Surgery Benefit',
            'med_rem_benefit'   => 'Medical Reimbursement Benefit',
        ],

        /** 02. Details of Health */
        'child_details_health_widget' => [
            'title' => '02. Details of Health',
            'q_1'   => '01. Has the child having or ever had any deformity ?',
            'q_2'   => '02. Has the child had any illness, accident,or operation or presently on investigation recommend to get done ?',
            'q_3'   => '03. Has the child been having or ever had any of the illnesses in the following organs or systems ?',
            'q_3_1' => '03.01. The Heart or the Blood Vessels',
            'q_3_2' => '03.02. The Nose, Throat and Lungs',
            'q_3_3' => '03.03. The Stomach, Intestines, Liver and Gall Bladder',
            'q_3_4' => '03.04. The Kidneys, Bladder and Genital Organs',
            'q_3_5' => '03.05. The(Central) Nervous system, Eyes and Ears',
            'q_3_6' => '03.06. The Endocrine system and Blood',
            'q_3_7' => '03.07. The Skin, Muscles, Bones and Joints',
            'q_4'   => '04. Within the past 2 years, has the child had any illness, injury, operation, medication, hospital care or medical examination not mentioned above ?',
            'q_5'   => '05. Is your child currently receiving medical treatment from a doctor ?',
            /** Question answer table */
            'q_number'          => 'Q.No',
            'dis_dis_exam'      => 'Disease, disorder or examination',
            'from_when_to_when' => 'From when to when',
            'result'            => 'Result',
            'physician'         => 'Name of the Physician/ Hospital',
        ],
    ],
];

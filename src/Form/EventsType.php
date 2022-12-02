<?php

namespace App\Form;

use App\Entity\Events;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\File;

class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["attr"=> ["placeholder"=> "Name of the Event", "class"=>"form-control mb-2"]])
            ->add('date', DateType::class, ["attr"=> ["placeholder"=> "Date", "class"=>"form-control mb-2"]])
            ->add('time', TimeType::class, ["attr"=> ["placeholder"=> "Time", "class"=>"form-control mb-2"]])
            ->add('description', TextareaType::class, ["attr"=> ["placeholder"=> "Description", "class"=>"form-control mb-2"]])
            ->add('image', FileType::class, [
                'label' => 'Image',
                "attr"=> ["class"=>"form-control mb-2"],
                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid picture document',
                    ])
                ],
                ])

            ->add('capacity', IntegerType::class, ["attr"=> ["placeholder"=> "Capacity", "class"=>"form-control mb-2"]])
            ->add('email', EmailType::class, ["attr"=> ["placeholder"=> "E-Mail", "class"=>"form-control mb-2"]])
            ->add('pnumber', IntegerType::class, ["attr"=> ["placeholder"=> "Phone number", "class"=>"form-control mb-2"]])
            ->add('address', TextType::class, ["attr"=> ["placeholder"=> "Where is the event?", "class"=>"form-control mb-2"]])
            ->add('url', TextType::class, ["attr"=> ["placeholder"=> "Insert the URL from the event.", "class"=>"form-control mb-2"]])
            ->add('type', TextType::class, ["attr"=> ["placeholder"=> "Music, Theater, Concert?", "class"=>"form-control mb-2"]] );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Events::class,
        ]);
    }
}

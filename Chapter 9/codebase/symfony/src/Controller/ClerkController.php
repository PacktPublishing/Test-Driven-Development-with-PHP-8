<?php

namespace App\Controller;

use App\DAL\Reader\Doctrine\ColorReader;
use App\DAL\Reader\Doctrine\ManufacturerReader;
use App\DAL\Writer\Doctrine\ToyCarWriter;
use App\Factory\ToyCarValidatorFactory;
use App\Model\ToyCar as ToyCarModel;
use App\Processor\ToyCarCreator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClerkController extends AbstractController
{
    /**
     * @var ToyCarCreator
     */
    private $toyCarCreator;

    /**
     * @var ColorReader
     */
    private $colorReader;

    /**
     * @var ManufacturerReader
     */
    private $manufacturerReader;

    /**
     * @param ToyCarWriter $toyCarWriter
     * @param ColorReader $colorReader
     * @param ManufacturerReader $manufacturerReader
     */
    public function __construct(ToyCarCreator $toyCarCreator, ColorReader $colorReader, ManufacturerReader $manufacturerReader)
    {
        $this->setToyCarCreator($toyCarCreator);
        $this->setColorReader($colorReader);
        $this->setManufacturerReader($manufacturerReader);
        $this->setTheCustomValidators();
    }

    #[Route('/clerk', name: 'app_clerk')]
    public function index(Request $request): Response
    {
        $allColors          = $this->getColorReader()->getAll();
        $allManufacturers   = $this->getManufacturerReader()->getAll();
        $form               = $this->buildForm($allColors, $allManufacturers);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hydrate a toy car model:
            $toyCarModel = new ToyCarModel();
            $toyCarModel->setName($form->get('name')->getData());
            $toyCarModel->setYear($form->get('year')->getData());
            $toyCarModel->setColour($form->get('color')->getData());
            $toyCarModel->setManufacturer($form->get('manufacturer')->getData());

            try {
                $this->getToyCarCreator()->create($toyCarModel);
                return $this->redirectToRoute('app_table');
            } catch (\Exception $ex) {
                throw $ex;
            }
        }

        return $this->render('clerk/index.html.twig', [
            'clerk_form' => $form->createView(),
        ]);
    }

    /**
     * Setter injection example:
     * This will be executed during runtime.
     */
    private function setTheCustomValidators()
    {
        $this->getToyCarCreator()->setValidator(ToyCarValidatorFactory::build());
    }

    /**
     * @param array $allColors
     * @param array $allManufacturers
     * @return FormInterface
     */
    private function buildForm(array $allColors, array $allManufacturers): FormInterface
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('year', IntegerType::class)
            ->add('color', ChoiceType::class, [
                'choices'   => $allColors,
            ])
            ->add('manufacturer', ChoiceType::class, [
                'choices'   => $allManufacturers,
            ])
            ->add('save', SubmitType::class, ['label' => 'Add Toy Car'])
            ->getForm();

        return $form;
    }

    /**
     * @return ToyCarCreator
     */
    public function getToyCarCreator(): ToyCarCreator
    {
        return $this->toyCarCreator;
    }

    /**
     * @param ToyCarCreator $toyCarCreator
     * @return ClerkController
     */
    public function setToyCarCreator(ToyCarCreator $toyCarCreator): ClerkController
    {
        $this->toyCarCreator = $toyCarCreator;
        return $this;
    }

    /**
     * @return ColorReader
     */
    public function getColorReader(): ColorReader
    {
        return $this->colorReader;
    }

    /**
     * @param ColorReader $colorReader
     * @return ClerkController
     */
    public function setColorReader(ColorReader $colorReader): ClerkController
    {
        $this->colorReader = $colorReader;
        return $this;
    }

    /**
     * @return ManufacturerReader
     */
    public function getManufacturerReader(): ManufacturerReader
    {
        return $this->manufacturerReader;
    }

    /**
     * @param ManufacturerReader $manufacturerReader
     * @return ClerkController
     */
    public function setManufacturerReader(ManufacturerReader $manufacturerReader): ClerkController
    {
        $this->manufacturerReader = $manufacturerReader;
        return $this;
    }
}

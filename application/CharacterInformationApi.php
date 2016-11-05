<?php
namespace application;
use domain\CharacterInformation;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class CharacterInformationApi
{
    /**
     * @var CharacterInformationRepository
     */
    private $characterInformationRepository;

    /**
     * CharacterInformationApi constructor.
     * @param CharacterInformationRepository $characterInformationRepository
     */
    public function __construct(CharacterInformationRepository $characterInformationRepository)
    {
        $this->characterInformationRepository = $characterInformationRepository;
    }

    public function getInformationFor($race)
    {
        return $this->characterInformationRepository->getCharacterInformation($race);
    }

    public function saveCharacter(CharacterInformation $character)
    {
        $this->characterInformationRepository->saveCharacter($character);
    }
}
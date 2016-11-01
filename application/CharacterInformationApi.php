<?php
namespace application;

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

    public function getInformationFor($character)
    {
        return $this->characterInformationRepository->getCharacterInformation($character);
    }
}
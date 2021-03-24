<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\TokenResource;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * RegisterController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request)
    {

        $createdUser = $this->userRepository->create($request->validated());

        Auth::attempt($request->only(['email','password']));

        return new TokenResource($createdUser);
    }
}

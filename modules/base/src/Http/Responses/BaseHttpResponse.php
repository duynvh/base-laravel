<?php

namespace Module\Base\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;
use URL;

class BaseHttpResponse implements Responsable
{
    /**
     * @var bool
     */
    protected $error = false;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $previousUrl = '';

    /**
     * @var string
     */
    protected $nextUrl = '';

    /**
     * @var bool
     */
    protected $withInput = false;

    /**
     * @var int
     */
    protected $code = 200;

    /**
     * @param $data
     * @return BaseHttpResponse
     * @author Duy Nguyen
     */
    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param string $previousUrl
     * @return BaseHttpResponse
     */
    public function setPreviousUrl($previousUrl): self
    {
        $this->previousUrl = $previousUrl;
        return $this;
    }

    /**
     * @param string $next_url
     * @return BaseHttpResponse
     */
    public function setNextUrl($nextUrl): self
    {
        $this->nextUrl = $nextUrl;
        return $this;
    }

    /**
     * @param bool $with_input
     * @return BaseHttpResponse
     */
    public function setWithInput(bool $withInput = true): self
    {
        $this->withInput = $withInput;
        return $this;
    }

    /**
     * @param int $code
     * @return BaseHttpResponse
     */
    public function setCode(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param $message
     * @return BaseHttpResponse
     */
    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->error;
    }

    /**
     * @param $error
     * @return BaseHttpResponse
     */
    public function setError(bool $error = true): self
    {
        $this->error = $error;
        return $this;
    }

    /**
     * @return BaseHttpResponse|\Illuminate\Http\RedirectResponse|JsonResource
     */
    public function toApiResponse()
    {
        if ($this->data instanceof JsonResource) {
            return $this->data->additional([
                'error'   => $this->error,
                'message' => $this->message,
            ]);
        }
        return $this->toResponse(request());
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        if ($request->expectsJson()) {
            return response()
                ->json([
                    'error'   => $this->error,
                    'data'    => $this->data,
                    'message' => $this->message,
                ], $this->code);
        }

        if ($request->input('submit') === 'save' && !empty($this->previousUrl)) {
            return $this->responseRedirect($this->previousUrl);
        } elseif (!empty($this->nextUrl)) {
            return $this->responseRedirect($this->nextUrl);
        }

        return $this->responseRedirect(URL::previous());
    }

    /**
     * @param string $url
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function responseRedirect($url)
    {
        if ($this->withInput) {
            return redirect()
                ->to($url)
                ->with($this->error ? 'error_msg' : 'success_msg', $this->message)
                ->withInput();
        }

        return redirect()
            ->to($url)
            ->with($this->error ? 'error_msg' : 'success_msg', $this->message);
    }
}
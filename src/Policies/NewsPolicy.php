<?php

namespace Armincms\News\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Contracts\Auth\Authenticatable;
use Armincms\News\News; 

class NewsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return mixed
     */
    public function viewAny(Authenticatable $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function view(Authenticatable $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can create news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return mixed
     */
    public function create(Authenticatable $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function update(Authenticatable $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function delete(Authenticatable $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function restore(Authenticatable $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function forceDelete(Authenticatable $user, News $news)
    {
        return true;
    } 

    /**
     * Determine whether the user can draft the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function draft(Authenticatable $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can pending the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function pending(Authenticatable $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can review the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function review(Authenticatable $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can publish the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function publish(Authenticatable $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can archive the news.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  \Armincms\News\News  $news
     * @return mixed
     */
    public function archive(Authenticatable $user, News $news)
    {
        return true;
    }
}

<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/2015
 */
namespace tests\functional\management\authenticated;

use App\Gazzete\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use TestCase;

/**
 * Verify an authenticated user can view common layout contents.
 */
class LayoutTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_header()
	{
		$user = factory(User::class)->create();

		$this->actingAs($user)
			->visit(route('management.home'))
			->see('<title>Home &middot; Gazzete CMS</title>')
			->see('<a href="' . route('management.home') . '" class="logo">')
			->see('<span class="logo-mini"><b>G</b>MS</span>')
			->see('<span class="logo-lg"><b>Gazzete</b>MS</span> </a>')
			->see('<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">')
			->see('<span class="hidden-xs">' . $user->name . '</span>')
			->see('<img src="' . $user->avatar . '" class="user-image" alt="User Image"/>')
			->see('<img src="' . $user->avatar . '" class="img-circle" alt="User Image"/>')
			->see('<p>' . $user->name . '
                                <small>Member since ' . $user->created_at . '</small>
                            </p>');
	}

	/** @test */
	public function it_reads_sidebar()
	{
		$user = factory(User::class)->create();

		$this->actingAs($user)
			->visit(route('management.home'))
			->see('<img src="' . $user->avatar . '" class="img-circle" alt="User Image"/>')
			->see('<p>' . $user->name . '</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>')
			->see('<a href="#"> <i class="fa fa-dashboard"></i> <span>Posts</span>')
			->see('<li><a href="' . route('management.posts.create') . '"><i class="fa fa-circle-o"></i> Create</a>');
	}

	/** @test */
	public function it_reads_footer()
	{
		$user = factory(User::class)->create();

		$this->actingAs($user)
			->visit(route('management.home'))
			->see('<b>Version</b> 0.1.0')
			->see('<strong>Copyright &copy; ' . date('Y') . '
            <a href="https://github.com/Hub-IT/gazzete">Gazzete</a>.</strong> MIT License.');
	}
}

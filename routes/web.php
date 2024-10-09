<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController, AdvisorController, TeamController, AboutController, CategoryController};
use App\Http\Controllers\{BlogController, CountryController, CountryDetailController, UniversityController};
use App\Http\Controllers\{UniversityDetailController, SuccessStoryController, EventController, ReviewController};
use App\Http\Controllers\{PartnerController, SurveyController, StudentController, UserController};
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

// User Frontend All Route
Route::get('/', [UserController::class, 'Index'])->name('home');
// Route::post('/frontend/store/user', [UserController::class, 'FrontendStoreUser'])->name('frontend.store.user');
Route::get('/user/detail/{id}', [UserController::class, 'UserDetail'])->name('user.detail');
Route::get('/about', [UserController::class, 'About'])->name('about');
Route::get('/country/list', [UserController::class, 'CountryList'])->name('country.list');
Route::get('/country/details/{id}/{slug}', [UserController::class, 'CountryDetails']);

// Route::get('/university/list', [UserController::class, 'UniversityList'])->name('university.list');
Route::get('/frontend/university/detail/{id}', [UserController::class, 'UniversityDetail'])->name('university.detail.user');
Route::get('/success/story/list', [UserController::class, 'SuccessStoryList'])->name('success.story.list');
Route::get('/success/story/detail/{id}', [UserController::class, 'SuccessStoryDetail'])->name('success.story.detail');
Route::get('/event/list', [UserController::class, 'EventList'])->name('event.list');
Route::get('/privacy/policy', [UserController::class, 'PrivacyPolicy'])->name('privacy.policy');

Route::get('/blog/list', [UserController::class, 'BlogList'])->name('blog.list');
Route::get('/blog/detail/{id}/{slug}', [UserController::class, 'BlogDetail']);
Route::get('/category/blog/{cat_id}', [UserController::class, 'CategoryBlog'])->name('category.blog');
Route::post('/store/comment', [UserController::class, 'StoreComment'])->name('store.comment');
Route::get('/contact', [UserController::class, 'Contact'])->name('contact');
Route::post('/frontend/survey/store', [UserController::class, 'FrontendSurveyStore'])->name('frontend.survey.store');
// Route::post('/store/contact', [UserController::class, 'StoreContact'])->name('store.contact');

Route::post('/search/university', [UserController::class, 'SearchUniversity'])->name('search.university');
Route::get('/management/list', [UserController::class, 'ManagementList'])->name('management.list');
Route::get('/advisor/list', [UserController::class, 'AdvisorList'])->name('advisor.list');
Route::get('/review/list', [UserController::class, 'ReviewList'])->name('review.list');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/frontend/student/create', [StudentController::class, 'FrontendStudentCreate'])->name('frontend.student.create');
    Route::post('/frontend/student/store', [StudentController::class, 'FrontendStudentStore'])->name('frontend.student.store');
    Route::get('/frontend/student/edit/{id}', [StudentController::class, 'FrontendStudentEdit'])->name('frontend.student.edit');
    Route::post('/frontend/student/update/{id}', [StudentController::class, 'FrontendStudentUpdate'])->name('frontend.student.update');
    Route::get('/frontend/student/download/{id}', [StudentController::class, 'FrontendStudentDownload'])->name('frontend.student.download');
});

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/delete', [AdminController::class, 'AdminDelete'])->name('admin.delete');
    Route::get('/manage/account', [AdminController::class, 'ManageAccount'])->name('manage.account');
    Route::post('/change/profile', [AdminController::class, 'ChangeProfile'])->name('change.profile');
    Route::post('/change/email', [AdminController::class, 'ChangeEmail'])->name('change.email');

    Route::post('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::get('/profile/data', [AdminController::class, 'ProfileData'])->name('profile.data');
    Route::get('/register/user', [AdminController::class, 'RegisterUser'])->name('register.user');
    Route::post('/store/user', [AdminController::class, 'StoreUser'])->name('store.user');
    Route::get('/admin/blog/comment', [AdminController::class, 'AdminBlogComment'])->name('admin.blog.comment');
    Route::get('/admin/comment/reply/{id}', [AdminController::class, 'AdminCommentReply'])->name('admin.comment.reply');
    Route::post('/reply/message', [AdminController::class, 'Replymessage'])->name('reply.message');

    // Route::get('/contact/message', [AdminController::class, 'ContactMessage'])->name('contact.message');
    // Route::get('/contact/detail/{id}', [AdminController::class, 'ContactDetail'])->name('contact.detail');
    // Route::post('/contact/update/{id}', [AdminController::class, 'ContactUpdate'])->name('contact.update');

    Route::get('/about/index', [AboutController::class, 'AboutIndex'])->name('about.index');
    Route::get('/about/edit', [AboutController::class, 'AboutEdit'])->name('about.edit');
    Route::post('/about/update', [AboutController::class, 'AboutUpdate'])->name('about.update');

    Route::get('/team/index', [TeamController::class, 'TeamIndex'])->name('team.index');
    Route::get('/team/create', [TeamController::class, 'TeamCreate'])->name('team.create');
    Route::post('/team/store', [TeamController::class, 'TeamStore'])->name('team.store');
    Route::get('/team/edit/{id}', [TeamController::class, 'TeamEdit'])->name('team.edit');
    Route::post('/team/update/{id}', [TeamController::class, 'TeamUpdate'])->name('team.update');
    Route::get('/team/show/{id}', [TeamController::class, 'TeamShow'])->name('team.show');
    Route::get('/team/delete/{id}', [TeamController::class, 'TeamDelete'])->name('team.delete');

    Route::get('/advisor/index', [AdvisorController::class, 'AdvisorIndex'])->name('advisor.index');
    Route::get('/advisor/create', [AdvisorController::class, 'AdvisorCreate'])->name('advisor.create');
    Route::post('/advisor/store', [AdvisorController::class, 'AdvisorStore'])->name('advisor.store');
    Route::get('/advisor/edit/{id}', [AdvisorController::class, 'AdvisorEdit'])->name('advisor.edit');
    Route::post('/advisor/update/{id}', [AdvisorController::class, 'AdvisorUpdate'])->name('advisor.update');
    Route::get('/advisor/show/{id}', [AdvisorController::class, 'AdvisorShow'])->name('advisor.show');
    Route::get('/advisor/delete/{id}', [AdvisorController::class, 'AdvisorDelete'])->name('advisor.delete');

    Route::get('/category/index', [CategoryController::class, 'CategoryIndex'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'CategoryCreate'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

    Route::get('/blog/{cat_id}/related', [BlogController::class, 'BlogRelated'])->name('blog.related');
    Route::get('/blog/trash', [BlogController::class, 'BlogTrash'])->name('blog.trash');
    Route::get('/blog/{id}/restore', [BlogController::class, 'BlogRestore'])->name('blog.restore');
    Route::get('/blog/{id}/forceDelete', [BlogController::class, 'BlogForceDelete'])->name('blog.force.delete');
    Route::resource('blog', BlogController::class);

    Route::get('/country/index', [CountryController::class, 'CountryIndex'])->name('country.index');
    Route::get('/country/create', [CountryController::class, 'CountryCreate'])->name('country.create');
    Route::post('/country/store', [CountryController::class, 'CountryStore'])->name('country.store');
    Route::get('/country/edit/{id}', [CountryController::class, 'CountryEdit'])->name('country.edit');
    Route::post('/country/update/{id}', [CountryController::class, 'CountryUpdate'])->name('country.update');
    Route::get('/country/delete/{id}', [CountryController::class, 'CountryDelete'])->name('country.delete');

    Route::get('/country/detail/index', [CountryDetailController::class, 'CountryDetailIndex'])->name('country.detail.index');
    Route::get('/country/detail/create', [CountryDetailController::class, 'CountryDetailCreate'])->name('country.detail.create');
    Route::post('/country/detail/store', [CountryDetailController::class, 'CountryDetailStore'])->name('country.detail.store');
    Route::get('/country/detail/edit/{id}', [CountryDetailController::class, 'CountryDetailEdit'])->name('country.detail.edit');
    Route::post('/country/detail/update/{id}', [CountryDetailController::class, 'CountryDetailUpdate'])->name('country.detail.update');
    Route::get('/country/detail/delete/{id}', [CountryDetailController::class, 'CountryDetailDelete'])->name('country.detail.delete');

    Route::get('/university/index', [UniversityController::class, 'UniversityIndex'])->name('university.index');
    Route::get('/university/create', [UniversityController::class, 'UniversityCreate'])->name('university.create');
    Route::post('/university/store', [UniversityController::class, 'UniversityStore'])->name('university.store');
    Route::get('/university/edit/{id}', [UniversityController::class, 'UniversityEdit'])->name('university.edit');
    Route::post('/university/update/{id}', [UniversityController::class, 'UniversityUpdate'])->name('university.update');
    Route::get('/university/delete/{id}', [UniversityController::class, 'UniversityDelete'])->name('university.delete');

    Route::get('/university/detail/index', [UniversityDetailController::class,'UniversityDetailIndex'])->name('university.detail.index');
    Route::get('/university/detail/create', [UniversityDetailController::class,'UniversityDetailCreate'])->name('university.detail.create');
    Route::post('/university/detail/store', [UniversityDetailController::class,'UniversityDetailStore'])->name('university.detail.store');
    Route::get('/university/detail/show/{id}', [UniversityDetailController::class,'UniversityDetailShow'])->name('university.detail.show');
    Route::get('/university/detail/edit/{id}', [UniversityDetailController::class,'UniversityDetailEdit'])->name('university.detail.edit');
    Route::post('/university/detail/update/{id}', [UniversityDetailController::class,'UniversityDetailUpdate'])->name('university.detail.update');
    Route::get('/university/detail/delete/{id}', [UniversityDetailController::class,'UniversityDetailDelete'])->name('university.detail.delete');

    Route::get('/success/story/index', [SuccessStoryController::class, 'SuccessStoryIndex'])->name('success.story.index');
    Route::get('/success/story/create', [SuccessStoryController::class, 'SuccessStoryCreate'])->name('success.story.create');
    Route::post('/success/story/store', [SuccessStoryController::class, 'SuccessStoryStore'])->name('success.story.store');
    Route::get('/success/story/edit/{id}', [SuccessStoryController::class, 'SuccessStoryEdit'])->name('success.story.edit');
    Route::post('/success/story/update/{id}', [SuccessStoryController::class, 'SuccessStoryUpdate'])->name('success.story.update');
    Route::get('/success/story/delete/{id}', [SuccessStoryController::class, 'SuccessStoryDelete'])->name('success.story.delete');

    Route::get('/event/index', [EventController::class, 'EventIndex'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'EventCreate'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'EventStore'])->name('event.store');
    Route::get('/event/edit/{id}', [EventController::class, 'EventEdit'])->name('event.edit');
    Route::post('/event/update/{id}', [EventController::class, 'EventUpdate'])->name('event.update');
    Route::get('/event/delete/{id}', [EventController::class, 'EventDelete'])->name('event.delete');

    Route::get('/review/index', [ReviewController::class, 'ReviewIndex'])->name('review.index');
    Route::get('/review/create', [ReviewController::class, 'ReviewCreate'])->name('review.create');
    Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');
    Route::get('/review/edit/{id}', [ReviewController::class, 'ReviewEdit'])->name('review.edit');
    Route::post('/review/update/{id}', [ReviewController::class, 'ReviewUpdate'])->name('review.update');
    Route::get('/review/delete/{id}', [ReviewController::class, 'ReviewDelete'])->name('review.delete');

    Route::get('/partner/index', [PartnerController::class, 'PartnerIndex'])->name('partner.index');
    Route::get('/partner/create', [PartnerController::class, 'PartnerCreate'])->name('partner.create');
    Route::post('/partner/store', [PartnerController::class, 'PartnerStore'])->name('partner.store');
    Route::get('/partner/edit/{id}', [PartnerController::class, 'PartnerEdit'])->name('partner.edit');
    Route::post('/partner/update/{id}', [PartnerController::class, 'PartnerUpdate'])->name('partner.update');
    Route::get('/partner/delete/{id}', [PartnerController::class, 'PartnerDelete'])->name('partner.delete');

    Route::get('/survey/index', [SurveyController::class, 'SurveyIndex'])->name('survey.index');
    Route::get('/survey/create', [SurveyController::class, 'SurveyCreate'])->name('survey.create');
    Route::post('/survey/store', [SurveyController::class, 'SurveyStore'])->name('survey.store');
    Route::get('/survey/edit/{id}', [SurveyController::class, 'SurveyEdit'])->name('survey.edit');
    Route::post('/survey/update/{id}', [SurveyController::class, 'SurveyUpdate'])->name('survey.update');
    Route::get('/survey/delete/{id}', [SurveyController::class, 'SurveyDelete'])->name('survey.delete');
    Route::get('/survey/export', [SurveyController::class, 'SurveyExport'])->name('survey.export');
    Route::post('/survey/import', [SurveyController::class, 'SurveyImport'])->name('survey.import');

    Route::get('/student/index', [StudentController::class, 'StudentIndex'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'StudentCreate'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'StudentStore'])->name('student.store');
    Route::get('/student/edit/{id}', [StudentController::class, 'StudentEdit'])->name('student.edit');
    Route::get('/student/invoice/{id}', [StudentController::class, 'StudentInvoice'])->name('student.invoice');
    Route::post('/student/update/{id}', [StudentController::class, 'StudentUpdate'])->name('student.update');

    Route::get('/student/export', [StudentController::class, 'StudentExport'])->name('student.export');
    Route::get('/background/export', [StudentController::class, 'BackgroundExport'])->name('background.export');
    Route::get('/score/export', [StudentController::class, 'ScoreExport'])->name('score.export');
    Route::get('/job/export', [StudentController::class, 'JobExport'])->name('job.export');
    Route::get('/where/apply/export', [StudentController::class, 'WhereApplyExport'])->name('where.apply.export');
});
Route::middleware(['auth','role:advisor'])->group(function () {
    Route::get('/advisor/dashboard', [AdvisorController::class, 'AdvisorDashboard'])->name('advisor.dashboard');
});
Route::middleware(['auth','role:team'])->group(function () {
    Route::get('/team/dashboard', [TeamController::class, 'TeamDashboard'])->name('team.dashboard');
});

require __DIR__.'/auth.php';

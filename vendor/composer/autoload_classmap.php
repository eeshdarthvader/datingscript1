<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'AbuseReport' => $baseDir . '/app/models/AbuseReport.php',
    'AbuseReportsManagmentController' => $baseDir . '/app/controllers/AbuseReportsManagmentController.php',
    'AccountSettingsController' => $baseDir . '/app/controllers/AccountSettingsController.php',
    'AdminManagmentController' => $baseDir . '/app/controllers/AdminManagmentController.php',
    'AppSetController' => $baseDir . '/app/controllers/AppSetController.php',
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'BlockUser' => $baseDir . '/app/models/BlockUser.php',
    'COuponManagmentController' => $baseDir . '/app/controllers/CouponManagmentController.php',
    'Cartalyst\\Sentry\\Groups\\GroupExistsException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Groups\\GroupNotFoundException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Groups\\NameRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Groups/Exceptions.php',
    'Cartalyst\\Sentry\\Throttling\\UserBannedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
    'Cartalyst\\Sentry\\Throttling\\UserSuspendedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Throttling/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\LoginRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\PasswordRequiredException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserAlreadyActivatedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserExistsException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserNotActivatedException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\UserNotFoundException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Cartalyst\\Sentry\\Users\\WrongPasswordException' => $vendorDir . '/cartalyst/sentry/src/Cartalyst/Sentry/Users/Exceptions.php',
    'Coupon' => $baseDir . '/app/models/Coupon.php',
    'CreateAbuseReportsTable' => $baseDir . '/app/database/migrations/2015_01_03_020104_create_abuse_reports_table.php',
    'CreateBlockedUsersTable' => $baseDir . '/app/database/migrations/2015_03_16_231951_create_blocked_users_table.php',
    'CreateCouponsTable' => $baseDir . '/app/database/migrations/2015_01_19_211108_create_coupons_table.php',
    'CreateCreditHistoryTable' => $baseDir . '/app/database/migrations/2014_12_31_233610_create_credit_history_table.php',
    'CreateCreditsPackagesTable' => $baseDir . '/app/database/migrations/2015_01_22_125330_create_credits_packages_table.php',
    'CreateCreditsTable' => $baseDir . '/app/database/migrations/2014_12_29_191316_create_credits_table.php',
    'CreateEncountersTable' => $baseDir . '/app/database/migrations/2015_03_16_232009_create_encounters_table.php',
    'CreateEventsTable' => $baseDir . '/app/database/migrations/2015_02_04_183444_create_events_table.php',
    'CreateFavoritesTable' => $baseDir . '/app/database/migrations/2015_03_16_232045_create_favorites_table.php',
    'CreateFriendsTable' => $baseDir . '/app/database/migrations/2015_03_16_232104_create_friends_table.php',
    'CreateGiftsTable' => $baseDir . '/app/database/migrations/2015_01_02_015057_create_gifts_table.php',
    'CreateInterestCategoriesTable' => $baseDir . '/app/database/migrations/2015_01_01_182946_create_interest_categories_table.php',
    'CreateInterestsTable' => $baseDir . '/app/database/migrations/2015_01_01_182518_create_interests_table.php',
    'CreatePhotoCommentRepliesTable' => $baseDir . '/app/database/migrations/2015_04_17_064145_create_photo_comment_replies_table.php',
    'CreatePhotoCommentsTable' => $baseDir . '/app/database/migrations/2015_04_17_064133_create_photo_comments_table.php',
    'CreatePhotosTable' => $baseDir . '/app/database/migrations/2014_12_29_191828_create_photos_table.php',
    'CreatePreferencesTable' => $baseDir . '/app/database/migrations/2015_03_16_121749_create_preferences_table.php',
    'CreateProfileFieldOptionsTable' => $baseDir . '/app/database/migrations/2015_01_21_233351_create_profile_field_options_table.php',
    'CreateProfileFieldSectionsTable' => $baseDir . '/app/database/migrations/2015_01_21_233359_create_profile_field_sections_table.php',
    'CreateProfileFieldsTable' => $baseDir . '/app/database/migrations/2015_01_21_233340_create_profile_fields_table.php',
    'CreateProfileVisitorsTable' => $baseDir . '/app/database/migrations/2015_03_16_231906_create_profile_visitors_table.php',
    'CreateRewardPackagesTable' => $baseDir . '/app/database/migrations/2015_01_02_232652_create_reward_packages_table.php',
    'CreateSessionTable' => $baseDir . '/app/database/migrations/2015_03_28_134731_create_session_table.php',
    'CreateSettingsTable' => $baseDir . '/app/database/migrations/2014_12_27_150259_create_settings_table.php',
    'CreateUserBotOnlineTable' => $baseDir . '/app/database/migrations/2015_02_04_143526_create_user_bot_online_table.php',
    'CreateUserInterestTable' => $baseDir . '/app/database/migrations/2015_03_17_090131_create_user_interest_table.php',
    'CreateUserNotificationsTable' => $baseDir . '/app/database/migrations/2015_04_16_111614_create_user_notifications_table.php',
    'CreateUserProfileFieldsTable' => $baseDir . '/app/database/migrations/2015_01_21_233417_create_user_profile_fields_table.php',
    'CreateUserProfileTable' => $baseDir . '/app/database/migrations/2015_03_17_070619_create_user_profile_table.php',
    'CreateUserSettingsTable' => $baseDir . '/app/database/migrations/2015_04_14_012752_create_user_settings_table.php',
    'CreditManagementController' => $baseDir . '/app/controllers/CreditManagementController.php',
    'Credithistory' => $baseDir . '/app/models/Credithistory.php',
    'Credits' => $baseDir . '/app/models/Credits.php',
    'CreditsPackage' => $baseDir . '/app/models/CreditsPackage.php',
    'DashboardController' => $baseDir . '/app/controllers/DashboardController.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'EmailManagmentController' => $baseDir . '/app/controllers/EmailManagmentController.php',
    'Encounter' => $baseDir . '/app/models/Encounter.php',
    'EventD' => $baseDir . '/app/models/EventD.php',
    'EventManagementController' => $baseDir . '/app/controllers/EventManagementController.php',
    'Favorite' => $baseDir . '/app/models/Favorite.php',
    'FinancialManagementController' => $baseDir . '/app/controllers/FinancialManagementController.php',
    'Friend' => $baseDir . '/app/models/Friend.php',
    'FrontController' => $baseDir . '/app/controllers/FrontController.php',
    'FrontendController' => $baseDir . '/app/controllers/FrontendController.php',
    'GameMechanicsManagementController' => $baseDir . '/app/controllers/GameMechanicsManagementController.php',
    'GiftManagmentController' => $baseDir . '/app/controllers/GiftManagmentController.php',
    'Gifts' => $baseDir . '/app/models/Gifts.php',
    'GoogleAnalyticsController' => $baseDir . '/app/controllers/GoogleAnalyticsController.php',
    'GrowthHackingController' => $baseDir . '/app/controllers/GrowthHackingController.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'ImporterManagementController' => $baseDir . '/app/controllers/ImporterManagementController.php',
    'InterestCategory' => $baseDir . '/app/models/InterestCategory.php',
    'Interests' => $baseDir . '/app/models/Interests.php',
    'InterestsManagmentController' => $baseDir . '/app/controllers/InterestsManagmentController.php',
    'Language' => $baseDir . '/app/models/Language.php',
    'LoginController' => $baseDir . '/app/controllers/LoginController.php',
    'Maatwebsite\\Excel\\Classes\\Cache' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Classes/Cache.php',
    'Maatwebsite\\Excel\\Classes\\FormatIdentifier' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Classes/FormatIdentifier.php',
    'Maatwebsite\\Excel\\Classes\\LaravelExcelWorksheet' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Classes/LaravelExcelWorksheet.php',
    'Maatwebsite\\Excel\\Classes\\PHPExcel' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Classes/PHPExcel.php',
    'Maatwebsite\\Excel\\Collections\\CellCollection' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Collections/CellCollection.php',
    'Maatwebsite\\Excel\\Collections\\ExcelCollection' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Collections/ExcelCollection.php',
    'Maatwebsite\\Excel\\Collections\\RowCollection' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Collections/RowCollection.php',
    'Maatwebsite\\Excel\\Collections\\SheetCollection' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Collections/SheetCollection.php',
    'Maatwebsite\\Excel\\Excel' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Excel.php',
    'Maatwebsite\\Excel\\ExcelServiceProvider' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/ExcelServiceProvider.php',
    'Maatwebsite\\Excel\\Exceptions\\LaravelExcelException' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Exceptions/LaravelExcelException.php',
    'Maatwebsite\\Excel\\Facades\\Excel' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Facades/Excel.php',
    'Maatwebsite\\Excel\\Files\\ExcelFile' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/ExcelFile.php',
    'Maatwebsite\\Excel\\Files\\ExportHandler' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/ExportHandler.php',
    'Maatwebsite\\Excel\\Files\\File' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/File.php',
    'Maatwebsite\\Excel\\Files\\ImportHandler' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/ImportHandler.php',
    'Maatwebsite\\Excel\\Files\\NewExcelFile' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Files/NewExcelFile.php',
    'Maatwebsite\\Excel\\Filters\\ChunkReadFilter' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Filters/ChunkReadFilter.php',
    'Maatwebsite\\Excel\\Parsers\\CssParser' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Parsers/CssParser.php',
    'Maatwebsite\\Excel\\Parsers\\ExcelParser' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Parsers/ExcelParser.php',
    'Maatwebsite\\Excel\\Parsers\\ViewParser' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Parsers/ViewParser.php',
    'Maatwebsite\\Excel\\Readers\\Batch' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Readers/Batch.php',
    'Maatwebsite\\Excel\\Readers\\ConfigReader' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Readers/ConfigReader.php',
    'Maatwebsite\\Excel\\Readers\\Html' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Readers/HtmlReader.php',
    'Maatwebsite\\Excel\\Readers\\LaravelExcelReader' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Readers/LaravelExcelReader.php',
    'Maatwebsite\\Excel\\Writers\\CellWriter' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Writers/CellWriter.php',
    'Maatwebsite\\Excel\\Writers\\LaravelExcelWriter' => $vendorDir . '/maatwebsite/excel/src/Maatwebsite/Excel/Writers/LaravelExcelWriter.php',
    'MigrationCartalystSentryInstallGroups' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225929_migration_cartalyst_sentry_install_groups.php',
    'MigrationCartalystSentryInstallThrottle' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225988_migration_cartalyst_sentry_install_throttle.php',
    'MigrationCartalystSentryInstallUsers' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225921_migration_cartalyst_sentry_install_users.php',
    'MigrationCartalystSentryInstallUsersGroupsPivot' => $vendorDir . '/cartalyst/sentry/src/migrations/2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot.php',
    'MultiLanguageManagementController' => $baseDir . '/app/controllers/MultiLanguageManagementController.php',
    'Notification' => $baseDir . '/app/models/Notification.php',
    'PaymentManagmentController' => $baseDir . '/app/controllers/PaymentManagmentController.php',
    'PhotoComment' => $baseDir . '/app/models/PhotoComment.php',
    'PhotoCommentReply' => $baseDir . '/app/models/PhotoCommentReply.php',
    'Photos' => $baseDir . '/app/models/Photos.php',
    'Preference' => $baseDir . '/app/models/Preference.php',
    'PremiumFeaturesController' => $baseDir . '/app/controllers/PremiumFeaturesController.php',
    'ProfileField' => $baseDir . '/app/models/ProfileField.php',
    'ProfileFieldManagementController' => $baseDir . '/app/controllers/ProfileFieldManagementController.php',
    'ProfileFieldOption' => $baseDir . '/app/models/ProfileFieldOption.php',
    'ProfileFieldSection' => $baseDir . '/app/models/ProfileFieldSection.php',
    'ProfileVisitor' => $baseDir . '/app/models/ProfileVisitor.php',
    'Providers\\EmailServiceProvider' => $baseDir . '/app/providers/EmailServiceProvider.php',
    'Providers\\LezumServiceProvider' => $baseDir . '/app/providers/LezumServiceProvider.php',
    'Providers\\NotificationServiceProvider' => $baseDir . '/app/providers/NotificationServiceProvider.php',
    'Providers\\UserActionServiceProvider' => $baseDir . '/app/providers/UserActionServiceProvider.php',
    'Repositories\\AbuseReportsRepository' => $baseDir . '/app/repositories/AbuseReportsRepository.php',
    'Repositories\\AccountSettingsRepository' => $baseDir . '/app/repositories/AccountSettingsRepository.php',
    'Repositories\\CommentsRepository' => $baseDir . '/app/repositories/CommentsRepository.php',
    'Repositories\\CouponRepository' => $baseDir . '/app/repositories/CouponRepository.php',
    'Repositories\\CreditRepository' => $baseDir . '/app/repositories/CreditRepository.php',
    'Repositories\\EncountersRepository' => $baseDir . '/app/repositories/EncountersRepository.php',
    'Repositories\\EventRepository' => $baseDir . '/app/repositories/EventRepository.php',
    'Repositories\\GiftRepository' => $baseDir . '/app/repositories/GiftRepository.php',
    'Repositories\\GiftRepositoryInterface' => $baseDir . '/app/repositories/GiftRepositoryInterface.php',
    'Repositories\\GiftServiceProvider' => $baseDir . '/app/repositories/GiftServiceProvider.php',
    'Repositories\\InterestsRepository' => $baseDir . '/app/repositories/InterestsRepository.php',
    'Repositories\\PhotoRepository' => $baseDir . '/app/repositories/PhotoRepository.php',
    'Repositories\\ProfileRepository' => $baseDir . '/app/repositories/ProfileRepository.php',
    'Repositories\\RewardRepository' => $baseDir . '/app/repositories/RewardRepository.php',
    'Repositories\\SettingRepository' => $baseDir . '/app/repositories/SettingRepository.php',
    'Repositories\\UserActionRepository' => $baseDir . '/app/repositories/UserActionRepository.php',
    'Repositories\\UserDashboardRepository' => $baseDir . '/app/repositories/UserDashboardRepository.php',
    'Repositories\\UserProfileRepository' => $baseDir . '/app/repositories/UserProfileRepository.php',
    'Repositories\\UserRepository' => $baseDir . '/app/repositories/UserRepository.php',
    'Reward' => $baseDir . '/app/models/Reward.php',
    'RewardManagmentController' => $baseDir . '/app/controllers/RewardManagmentController.php',
    'SeoManagmentController' => $baseDir . '/app/controllers/SeoManagmentController.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'Sessions' => $baseDir . '/app/models/Sessions.php',
    'Setting' => $baseDir . '/app/models/Setting.php',
    'SocialManagmentController' => $baseDir . '/app/controllers/SocialManagmentController.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'ThirdPartyController' => $baseDir . '/app/controllers/ThirdPartyController.php',
    'UpdateUsersTable' => $baseDir . '/app/database/migrations/2014_12_27_182412_update_users_table.php',
    'User' => $baseDir . '/app/models/User.php',
    'UserActionController' => $baseDir . '/app/controllers/UserActionController.php',
    'UserBotOnline' => $baseDir . '/app/models/UserBotOnline.php',
    'UserEncounterController' => $baseDir . '/app/controllers/UserEncounterController.php',
    'UserInterest' => $baseDir . '/app/models/UserInterest.php',
    'UserProfile' => $baseDir . '/app/models/UserProfile.php',
    'UserProfileController' => $baseDir . '/app/controllers/UserProfileController.php',
    'UserProfileField' => $baseDir . '/app/models/UserProfileField.php',
    'UserSetting' => $baseDir . '/app/models/UserSetting.php',
    'UserdashboardController' => $baseDir . '/app/controllers/UserdashboardController.php',
    'UsersManagmentController' => $baseDir . '/app/controllers/UsersManagmentController.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
);

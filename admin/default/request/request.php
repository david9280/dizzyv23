<?php
include_once "../../../includes/inc.php";
include "../../../includes/s3.php";
$statusValue = array('0', '1');
$statusTrueFalse = array('false', 'true');
$statusSubOneTwo = array('1', '2');
if (isset($_POST['f']) && $logedIn == '1' && $userType == '2') {
	$type = mysqli_real_escape_string($db, $_POST['f']);
	if ($type == 'logoFile' || $type == 'faviconFile') {
		//$availableFileExtensions
		if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
			$theValidateType = mysqli_real_escape_string($db, $_POST['c']);
			$fileReq = isset($_FILES['uploading']['name']) ? $_FILES['uploading']['name'] : NULL;
			if (is_array($fileReq) && !empty($fileReq)) { 
				foreach ($fileReq as $iname => $value) {
					$name = stripslashes($_FILES['uploading']['name'][$iname]);
					$size = $_FILES['uploading']['size'][$iname];
					$ext = getExtension($name);
					$ext = strtolower($ext);
					$valid_formats = explode(',', $availableVerificationFileExtensions);
					if (in_array($ext, $valid_formats)) {
						if (convert_to_mb($size) < $availableUploadFileSize) {
							$microtime = microtime();
							$removeMicrotime = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime);
							$UploadedFileName = "image_" . $removeMicrotime . '_' . $userID;
							$getFilename = $UploadedFileName . "." . $ext;
							// Change the image ame
							$tmp = $_FILES['uploading']['tmp_name'][$iname];
							$mimeType = $_FILES['uploading']['type'][$iname];
							$d = date('Y-m-d');
							if (preg_match('/video\/*/', $mimeType)) {
								$fileTypeIs = 'video';
							} else if (preg_match('/image\/*/', $mimeType)) {
								$fileTypeIs = 'Image';
							}
							if (!file_exists($uploadIconLogo . $d)) {
								$newFile = mkdir($uploadIconLogo . $d, 0755);
							}
							if (!file_exists($xImages . $d)) {
								$newFile = mkdir($xImages . $d, 0755);
							}
							if (move_uploaded_file($tmp, $uploadIconLogo . $d . '/' . $getFilename)) {
								/*IF FILE FORMAT IS VIDEO THEN DO FOLLOW*/
								if ($fileTypeIs == 'Image') {
									$pathFile = 'img/' . $d . '/' . $getFilename;
									$UploadSourceUrl = $base_url . 'img/' . $d . '/' . $getFilename;
								}
								echo 'img/' . $d . '/' . $getFilename;
							}
						} else {
							echo filter_var($size, FILTER_SANITIZE_STRING);
						}
					}
				} 
			}
		}
	}
	/*Update Site General Settings*/
	if ($type == 'updateGeneral') {
		$updateSiteLogo = mysqli_real_escape_string($db, $_POST['logo']);
		$updateSiteFavicon = mysqli_real_escape_string($db, $_POST['favicon']);
		$updateSiteKeywords = mysqli_real_escape_string($db, $_POST['site_keywords']);
		$updateSiteDescription = mysqli_real_escape_string($db, $_POST['site_description']);
		$updateSiteTitle = mysqli_real_escape_string($db, $_POST['site_title']);
		$updateSiteName = mysqli_real_escape_string($db, $_POST['site_name']);
		$updateSiteConfirugarion = $iN->iN_UpdateSiteConfiguration($userID, $iN->iN_Secure($updateSiteLogo), $iN->iN_Secure($updateSiteFavicon), $iN->iN_Secure($updateSiteKeywords), $iN->iN_Secure($updateSiteDescription), $iN->iN_Secure($updateSiteTitle), $iN->iN_Secure($updateSiteName));
		if ($updateSiteConfirugarion) {
			exit('200');
		} else {
			echo '404';
		}
	}
	/*Update Site Business Informations*/
	if ($type == 'updateBusiness') {
		$updateSiteCampanyName = mysqli_real_escape_string($db, $_POST['site_campany']);
		$updateSiteCountry = mysqli_real_escape_string($db, $_POST['country_code']);
		$updateSiteCity = mysqli_real_escape_string($db, $_POST['site_city']);
		$updateSiteBusinessAddress = mysqli_real_escape_string($db, $_POST['site_business_address']);
		$updateSitePostCode = mysqli_real_escape_string($db, $_POST['site_post_code']);
		$updateSiteVAT = mysqli_real_escape_string($db, $_POST['site_vat']);
		if (empty($updateSiteCampanyName) || empty($updateSiteCountry) || empty($updateSiteCity) || empty($updateSiteBusinessAddress) || empty($updateSitePostCode) || empty($updateSiteVAT)) {
			exit('1');
		}
		$updateSiteBusinessInformations = $iN->iN_UpdateSiteBusinessInformations($userID, $iN->iN_Secure($updateSiteCampanyName), $iN->iN_Secure($updateSiteCountry), $iN->iN_Secure($updateSiteCity), $iN->iN_Secure($updateSiteBusinessAddress), $iN->iN_Secure($updateSitePostCode), $iN->iN_Secure($updateSiteVAT));
		if ($updateSiteBusinessInformations) {
			exit('200');
		} else {
			echo '404';
		}
	}
	if ($type == 'updateLimits') {
		$fileLimit = mysqli_real_escape_string($db, $_POST['file_limit']);
		$lengthLimit = mysqli_real_escape_string($db, $_POST['length_limit']);
		$postShowLimit = mysqli_real_escape_string($db, $_POST['post_show_limit']);
		$paginatonLimit = mysqli_real_escape_string($db, $_POST['pagination_limit']);
		$approvalFileExtension = mysqli_real_escape_string($db, $_POST['available_verification_file_extensions']);
		$availableUploadFileExtensions = mysqli_real_escape_string($db, $_POST['available_file_extensions']);
		$unavailableUsernames = mysqli_real_escape_string($db, $_POST['unavailable_usernames']);
		$ffmpeg_path = mysqli_real_escape_string($db, $_POST['ffmpeg_path']);
		if (empty($availableUploadFileExtensions) || $availableUploadFileExtensions == '') {
			exit('1');
		}
		if (empty($approvalFileExtension) || $approvalFileExtension == '') {
			exit('2');
		}
		$updateLimitValues = $iN->iN_UpdateLimitValues($userID, $iN->iN_Secure($fileLimit), $iN->iN_Secure($lengthLimit), $iN->iN_Secure($postShowLimit), $iN->iN_Secure($paginatonLimit), $iN->iN_Secure($approvalFileExtension), $iN->iN_Secure($availableUploadFileExtensions), $iN->iN_Secure($ffmpeg_path), $iN->iN_Secure($unavailableUsernames));
		if ($updateLimitValues) {
			exit('200');
		} else {
			echo '404';
		}
	}
	if ($type == 'updateDefaultLang') {
		if (isset($_POST['lang'])) {
			$lang = mysqli_real_escape_string($db, $_POST['lang']);
			$updateDefaultLang = $iN->iN_UpdateDefaultLanguage($userID, $iN->iN_Secure($lang));
			if ($updateDefaultLang) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Update Maintenance Mode Status*/
	if ($type == 'maintenance_status') {
		if (in_array($_POST['mod'], $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateMaintenanceStatus = $iN->iN_UpdateMaintenanceStatus($userID, $iN->iN_Secure($mod));
			if ($updateMaintenanceStatus) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Update Email Send Mode Status*/
	if ($type == 'email_verification_status') {
		if (in_array($_POST['mod'], $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateEmailSendStatus = $iN->iN_UpdateEmailSendStatus($userID, $iN->iN_Secure($mod));
			if ($updateEmailSendStatus) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Update Register Status*/
	if ($type == 'register_new') {
		if (in_array($_POST['mod'], $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateRegisterStatus = $iN->iN_UpdateRegisterStatus($userID, $iN->iN_Secure($mod));
			if ($updateRegisterStatus) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Update ip Limit Status*/
	if ($type == 'ipLimit') {
		if (in_array($_POST['mod'], $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateipLimitStatus = $iN->iN_UpdateIpLimitStatus($userID, $iN->iN_Secure($mod));
			if ($updateipLimitStatus) {
				exit('200');
			} else {
				echo '404';
			}
		}
	} 
	/*Email Settings*/
	if ($type == 'emailSettings') {
		$updateSmtpMail = mysqli_real_escape_string($db, $_POST['smtpmail']);
		$updateSmtpEncription = mysqli_real_escape_string($db, $_POST['smtpecript']);
		$updateSmtpHost = mysqli_real_escape_string($db, $_POST['smtp_host']);
		$updateSmtpUsername = mysqli_real_escape_string($db, $_POST['smtp_username']);
		$updateSmtpPassword = mysqli_real_escape_string($db, $_POST['smtp_password']);
		$updateSmtpPort = mysqli_real_escape_string($db, $_POST['smtp_port']);
		if (empty($updateSmtpHost) || empty($updateSmtpUsername) || empty($updateSmtpPassword) || empty($updateSmtpPort)) {
			exit('1');
		}
		$updateEmailSettings = $iN->iN_UpdateEmailSettings($userID, $iN->iN_Secure($updateSmtpMail), $iN->iN_Secure($updateSmtpEncription), $iN->iN_Secure($updateSmtpHost), $iN->iN_Secure($updateSmtpUsername), $iN->iN_Secure($updateSmtpPassword), $iN->iN_Secure($updateSmtpPort));
		if ($updateEmailSettings) {
			exit('200');
		} else {
			echo '404';
		}
	}
	/*Update Amazon S3 Storage Details*/
	if ($type == 's3Settings') {
		$updateS3Region = mysqli_real_escape_string($db, $_POST['s3region']);
		$updateS3Bucket = mysqli_real_escape_string($db, $_POST['s3Bucket']);
		$updateS3Key = mysqli_real_escape_string($db, $_POST['s3Key']);
		$updateS3SecretKey = mysqli_real_escape_string($db, $_POST['s3sKey']);
		$updateS3Status = mysqli_real_escape_string($db, $_POST['s3Status']);
		$updateS3Settings = $iN->iN_UpdateAmazonS3Details($userID, $iN->iN_Secure($updateS3Region), $iN->iN_Secure($updateS3Bucket), $iN->iN_Secure($updateS3Key), $iN->iN_Secure($updateS3SecretKey), $iN->iN_Secure($updateS3Status));
		if ($updateS3Settings) {
			exit('200');
		} else {
			echo '404';
		}
	}
	/*Approve / Decline / Reject Pot*/
	if ($type == "postApprove") {
		$postDescription = mysqli_real_escape_string($db, $_POST['newpostDesc']);
		$postNewPoint = mysqli_real_escape_string($db, $_POST['newPostPoint']);
		$postApproveStat = mysqli_real_escape_string($db, $_POST['postApproveStatus']);
		$approvePostOwnerID = mysqli_real_escape_string($db, $_POST['postOwnerID']);
		$approvePostID = mysqli_real_escape_string($db, $_POST['postID']);
		$postApproveNot = mysqli_real_escape_string($db, $_POST['approve_not']);
		if (!isset($postApproveStat) || empty($postApproveStat) || $postApproveStat == '') {
			exit('You should Select the Post Status Approve, Decline or Reject');
		}
		if ($postNewPoint < $minimumPointLimit) {
			exit(preg_replace('/{.*?}/', $minimumPointLimit, $LANG['plan_point_warning']));
		}
		$approveUpdate = $iN->iN_UpdateApprovePostStatus($userID, $iN->iN_Secure($postDescription), $iN->iN_Secure($postNewPoint), $iN->iN_Secure($postApproveStat), $iN->iN_Secure($approvePostID), $iN->iN_Secure($approvePostOwnerID), $iN->iN_Secure($postApproveNot));
		if ($approveUpdate) {
			exit('200');
		} else {
			echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
		}
	}
	/*Delete Post*/
	if ($type == 'deletePost') {
		if (isset($_POST['id'])) {
			$postID = mysqli_real_escape_string($db, $_POST['id']);
			$deletePost = $iN->iN_DeletePremiumPostBeforeApprove($userID, $iN->iN_Secure($postID));
			if ($deletePost) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Edit Post*/
	if ($type == "editPostDetails") {
		$postDescription = mysqli_real_escape_string($db, $_POST['newpostDesc']);
		$editedPostOwnerID = mysqli_real_escape_string($db, $_POST['postOwnerID']);
		$editedPostID = mysqli_real_escape_string($db, $_POST['postID']);
		$postUpdate = $iN->iN_UpdatePostDetailsAdmin($userID, $iN->iN_Secure($postDescription), $iN->iN_Secure($editedPostID), $iN->iN_Secure($editedPostOwnerID));
		if ($postUpdate) {
			exit('200');
		} else {
			echo '404';
		}
	}
	/*Edit Post*/
	if ($type == "customCodes") {
		$customCssCode = mysqli_real_escape_string($db, $_POST['customCss']);
		$customHeaderJsCode = mysqli_real_escape_string($db, $_POST['customHeaderJs']);
		$customFooterJsCode = mysqli_real_escape_string($db, $_POST['customFooterJs']);
		$updateCustomCssCode = $iN->iN_UpdateCustomCodes($userID, $customCssCode, '1');
		$updateCustomHeaderJSCode = $iN->iN_UpdateCustomCodes($userID, $customHeaderJsCode, '2');
		$updateCustomFooterJsCode = $iN->iN_UpdateCustomCodes($userID, $customFooterJsCode, '3');
		exit('200');
	}
	/*Edited SVG*/
	if ($type == 'editedSVG') {
		$svgCode = mysqli_real_escape_string($db, $_POST['svgcode']);
		$iconID = mysqli_real_escape_string($db, $_POST['iconid']);
		if (!substr_count($svgCode, '<svg')) {
			exit('2');
		}
		if (empty($svgCode) || $svgCode == '') {
			exit('1');
		}
		$updateSvgCode = $iN->iN_UpdateSVGCode($userID, $iN->iN_Secure($iconID), $svgCode);
		if ($updateSvgCode) {
			exit('200');
		} else {
			exit($LANG['save_failed']);
		}
	}
	/*Update Icon SVG Status*/
	if ($type == 'iconSVGStatus') {
		if (in_array($_POST['mod'], $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$iconID = mysqli_real_escape_string($db, $_POST['svg']);
			$updateIconSVGStatus = $iN->iN_UpdateSVGIconStatus($userID, $iN->iN_Secure($mod), $iN->iN_Secure($iconID));
			if ($updateIconSVGStatus) {
				exit('200');
			} else {
				exit($LANG['noway_desc']);
			}
		}
	}
	/*Save New Svg Code*/
	if ($type == 'newSVG') {
		if (isset($_POST['newsvgcode']) && !empty($_POST['newsvgcode']) && $_POST['newsvgcode'] != '') {
			$newSVGCode = mysqli_real_escape_string($db, $_POST['newsvgcode']);
			if (!substr_count($newSVGCode, '<svg')) {
				exit('2');
			}
			$insertNewSVGCode = $iN->iN_InsertNewSVGCode($userID, $iN->xss_clean($newSVGCode));
			if ($insertNewSVGCode) {
				exit('200');
			} else {
				exit($LANG['save_failed']);
			}
		} else {
			exit('1');
		}
	}
	/*Edit Plan*/
	if ($type == 'editPlan') {
		if (isset($_POST['planKey']) && isset($_POST['planPoint']) && isset($_POST['pointAmount']) && isset($_POST['planid'])) {
			$planKey = mysqli_real_escape_string($db, $_POST['planKey']);
			$planPoint = mysqli_real_escape_string($db, $_POST['planPoint']);
			$planAmount = mysqli_real_escape_string($db, $_POST['pointAmount']);
			$planID = mysqli_real_escape_string($db, $_POST['planid']);
			$removeAllSpaceFromKey = preg_replace('/\s+/', '', $planKey);
			if ($planPoint < $minimumPointLimit || ctype_space($planPoint) || empty($planPoint)) {
				exit(preg_replace('/{.*?}/', $minimumPointLimit, $LANG['plan_point_warning']));
			}
			if ($planAmount > $maximumPointAmountLimit || ctype_space($planAmount) || empty($planAmount)) {
				exit(preg_replace('/{.*?}/', $maximumPointAmountLimit, $LANG['plan_point_amount_warning']));
			}
			if (ctype_space($planKey) || !isset($planKey) || empty($planKey)) {
				exit($LANG['plan_key_warning']);
			}
			if (empty($removeAllSpaceFromKey) || $removeAllSpaceFromKey == '' || empty($removeAllSpaceFromKey) || strlen($removeAllSpaceFromKey) == '0' || ctype_space($removeAllSpaceFromKey)) {
				exit('404');
			} else {
				$updatePlan = $iN->iN_UpdatePlanFromID($userID, $iN->iN_Secure($planKey), $iN->iN_Secure($planPoint), $iN->iN_Secure($planAmount), $iN->iN_Secure($planID));
				if ($updatePlan) {
					exit('200');
				} else {
					exit($LANG['noway_desc']);
				}
			}
		}
	}

	/*Add New Point Plan*/
	if ($type == 'newPackageForm') {
		if (isset($_POST['planKey']) && isset($_POST['planPoint']) && isset($_POST['pointAmount'])) {
			$planKey = mysqli_real_escape_string($db, $_POST['planKey']);
			$planPoint = mysqli_real_escape_string($db, $_POST['planPoint']);
			$planAmount = mysqli_real_escape_string($db, $_POST['pointAmount']);
			$removeAllSpaceFromKey = preg_replace('/\s+/', '', $planKey);
			if (ctype_space($planKey) || !isset($planKey) || empty($planKey)) {
				exit('4');
			}
			if ($planPoint < $minimumPointLimit || ctype_space($planPoint)) {
				exit('1');
			}
			if ($planAmount > $maximumPointAmountLimit || ctype_space($planAmount) || empty($planAmount)) {
				exit('3');
			}
			$updatePlan = $iN->iN_InsertNewPointPlan($userID, $iN->iN_Secure($planKey), $iN->iN_Secure($planPoint), $iN->iN_Secure($planAmount));
			if ($updatePlan) {
				exit('200');
			} else {
				exit($LANG['noway_desc']);
			}
		} else {
			echo '5';
		}
	}
	/*Change Plan Status*/
	if ($type == 'planStatus') {
		if (isset($_POST['id']) && in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$planID = mysqli_real_escape_string($db, $_POST['id']);
			$updatePlanStatus = $iN->iN_UpdatePlanStatus($userID, $iN->iN_Secure($mod), $iN->iN_Secure($planID));
			if ($updatePlanStatus) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Delete Post*/
	if ($type == 'deleteThisPlan') {
		if (isset($_POST['id'])) {
			$planID = mysqli_real_escape_string($db, $_POST['id']);
			$deletePlan = $iN->iN_DeletePlanFromData($userID, $iN->iN_Secure($planID));
			if ($deletePlan) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Update Language Status*/
	if ($type == 'upLang') {
		if (isset($_POST['id']) && in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$langID = mysqli_real_escape_string($db, $_POST['id']);
			$updateLanguageStatus = $iN->iN_UpdateLanguageStatus($userID, $iN->iN_Secure($mod), $iN->iN_Secure($langID));
			if ($updateLanguageStatus) {
				exit('200');
			} else {
				exit($LANG['noway_desc']);
			}
		}
	}
	/*Add New Point Plan*/
	if ($type == 'editLanguage') {
		if (isset($_POST['langabbreviationName']) && isset($_POST['id'])) {
			$langKey = mysqli_real_escape_string($db, $_POST['langabbreviationName']);
			$langID = mysqli_real_escape_string($db, $_POST['id']);
			$removeSpaceFromLangKEY = preg_replace('/\s+/', '', $langKey);
			if (ctype_space($langKey) || !isset($langKey)) {
				exit('1');
			}
			if (!array_key_exists($langKey, $LANGNAME)) {
				exit('3');
			}
			$updateLanguage = $iN->iN_UpdateLanguageByID($userID, $iN->iN_Secure($langKey), $iN->iN_Secure($langID));
			if ($updateLanguage) {
				exit('200');
			} else {
				echo '404';
			}
		} else {
			echo '2';
		}
	}
	/*Add New Language*/
	if ($type == 'addNewLanguage') {
		if (isset($_POST['newLangAbbreviation'])) {
			$langKey = mysqli_real_escape_string($db, $_POST['newLangAbbreviation']);
			if (ctype_space($langKey) || !isset($langKey) || empty($langKey)) {
				exit('1');
			}
			if (!array_key_exists($langKey, $LANGNAME)) {
				exit('2');
			}
			$addNewLanguage = $iN->iN_AddNewLanguageFromData($userID, $iN->iN_Secure($langKey));
			if ($addNewLanguage) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Delete Language*/
	if ($type == 'deleteThisLanguage') {
		if (isset($_POST['id'])) {
			$langID = mysqli_real_escape_string($db, $_POST['id']);
			if (ctype_space($langID) || !isset($langID) || empty($langID)) {
				exit('1');
			}
			$deleteLanguage = $iN->iN_DeleteLanguage($userID, $iN->iN_Secure($langID));
			if ($deleteLanguage) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Edit User Details*/
	if ($type == 'editUserDetails') {
		if (isset($_POST['verification']) && isset($_POST['usertype']) && isset($_POST['uwallet']) && isset($_POST['u'])) {
			$updateVerification = mysqli_real_escape_string($db, $_POST['verification']);
			$updateUserType = mysqli_real_escape_string($db, $_POST['usertype']);
			$updateUserWallet = mysqli_real_escape_string($db, $_POST['uwallet']);
			$updatedUser = mysqli_real_escape_string($db, $_POST['u']);

			if (empty($updateUserWallet)) {
				$updateUserWallet = '0';
			}
			$update = $iN->iN_UpdateUserProfile($userID, $iN->iN_Secure($updatedUser), $iN->iN_Secure($updateVerification), $iN->iN_Secure($updateUserType), $iN->iN_Secure($updateUserWallet));
			if ($update) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
	/*Delete User*/
	if ($type == 'deleteUser') {
		if (isset($_POST['id'])) {
			$deleteUserID = mysqli_real_escape_string($db, $_POST['id']);
			$deleteUser = $iN->iN_DeleteUser($userID, $iN->iN_Secure($deleteUserID));
			if ($deleteUser) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Delete User Verification Request*/
	if ($type == 'deleteUserVerification') {
		if (isset($_POST['id'])) {
			$verificationRequestID = mysqli_real_escape_string($db, $_POST['id']);
			$deleteVRequest = $iN->iN_DeleteVerificationRequest($userID, $iN->iN_Secure($verificationRequestID));
			if ($deleteVRequest) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
	/*Approve or Reject Verification Request*/
	if ($type == 'updateVerificationStatus') {
		if (isset($_POST['vID']) && isset($_POST['vApproveStatus'])) {
			$answerType = mysqli_real_escape_string($db, $_POST['vApproveStatus']);
			$answerValue = mysqli_real_escape_string($db, $_POST['approve_not']);
			$answeringVerificationID = mysqli_real_escape_string($db, $_POST['vID']);
			if (empty($answerType)) {
				exit('1');
			}
			$InsertAnswer = $iN->iN_UpdateVerificationProfileStatus($userID, $iN->iN_Secure($answerType), $iN->iN_Secure($answerValue), $iN->iN_Secure($answeringVerificationID));
			if ($InsertAnswer) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
	/*Update Page Details*/
	if ($type == 'editPage') {
		if (isset($_POST['page_title']) && isset($_POST['page_seo_url']) && isset($_POST['editor']) && isset($_POST['pageID'])) {
			$pageTitle = mysqli_real_escape_string($db, $_POST['page_title']);
			$pageSeoUrl = mysqli_real_escape_string($db, $_POST['page_seo_url']);
			$pageEditor = mysqli_real_escape_string($db, $_POST['editor']);
			$pageID = mysqli_real_escape_string($db, $_POST['pageID']);
			$pageEditor = $iN->xss_clean($pageEditor);
			if (empty($pageTitle)) {
				exit('1');
			}
			if (empty($pageSeoUrl)) {
				exit('2');
			}
			$savePageEdit = $iN->iN_SavePageEdit($userID, $iN->iN_Secure($pageTitle), $iN->iN_Secure($iN->url_slugies($pageSeoUrl)), $iN->iN_strip_unsafe($pageEditor), $iN->iN_Secure($pageID));
			if ($savePageEdit) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
	/*Create a New Page*/
	if ($type == 'createNewPage') {
		if (isset($_POST['page_title']) && isset($_POST['page_seo_url']) && isset($_POST['editor'])) {
			$pageTitle = mysqli_real_escape_string($db, $_POST['page_title']);
			$pageSeoUrl = mysqli_real_escape_string($db, $_POST['page_seo_url']);
			$pageEditor = mysqli_real_escape_string($db, $_POST['editor']);
			$pageEditor = $iN->xss_clean($pageEditor);
			if (empty($pageTitle)) {
				exit('1');
			}
			if (empty($pageSeoUrl)) {
				exit('2');
			}
			$createANewPage = $iN->iN_CreateANewPage($userID, $iN->iN_Secure($pageTitle), $iN->iN_Secure($iN->url_slugies($pageSeoUrl)), $iN->iN_strip_unsafe($pageEditor));
			if ($createANewPage) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
	/*Delete Post*/
	if ($type == 'deletePage') {
		if (isset($_POST['id'])) {
			$postID = mysqli_real_escape_string($db, $_POST['id']);
			$deletePost = $iN->iN_DeletePage($userID, $iN->iN_Secure($postID));
			if ($deletePost) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
	/*Delete QA*/
	if ($type == 'deleteQA') {
		if (isset($_POST['id'])) {
			$postID = mysqli_real_escape_string($db, $_POST['id']);
			$deletePost = $iN->iN_DeleteQA($userID, $iN->iN_Secure($postID));
			if ($deletePost) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}

	/*Edited Sticker URL*/
	if ($type == 'stickerEdit') {
		if (isset($_POST['stickerURL']) && isset($_POST['sid'])) {
			$stickerUrl = mysqli_real_escape_string($db, $_POST['stickerURL']);
			$sID = mysqli_real_escape_string($db, $_POST['sid']);
			if (ctype_space($stickerUrl) || !isset($stickerUrl) || empty($stickerUrl)) {
				exit('1');
			}
			if (filter_var($stickerUrl, FILTER_VALIDATE_URL) === FALSE) {
				exit('2');
			}
			if (!preg_match('/\.(jpeg|jpg|png|gif)$/i', $stickerUrl)) {
				exit('3');
			}
			$updateStickerURL = $iN->iN_UpdateStickerURL($userID, $iN->iN_Secure($stickerUrl), $iN->iN_Secure($sID));
			if ($updateStickerURL) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
	/*Delete User*/
	if ($type == 'deleteSticker') {
		if (isset($_POST['id'])) {
			$deleteStickerID = mysqli_real_escape_string($db, $_POST['id']);
			$deleteSTicker = $iN->iN_DeleteSticker($userID, $iN->iN_Secure($deleteStickerID));
			if ($deleteSTicker) {
				exit('200');
			} else {
				exit($LANG['sticker_id_not_available']);
			}
		}
	}
/*Add New Sticker Url*/
	if ($type == 'stickerNew') {
		if (isset($_POST['stickerURL'])) {
			$newStickerUrl = mysqli_real_escape_string($db, $_POST['stickerURL']);
			if (ctype_space($newStickerUrl) || !isset($newStickerUrl) || empty($newStickerUrl)) {
				exit('1');
			}
			if (filter_var($newStickerUrl, FILTER_VALIDATE_URL) === FALSE) {
				exit('2');
			}
			if (!preg_match('/\.(jpeg|jpg|png|gif)$/i', $newStickerUrl)) {
				exit('3');
			}
			$insertNewSticker = $iN->iN_InsertNewStickerURL($userID, $iN->iN_Secure($newStickerUrl));
			if ($insertNewSticker) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		} else {
			exit('1');
		}
	}
/*Update Sticker Status*/
	if ($type == 'upStick') {
		if (isset($_POST['id']) && in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$langID = mysqli_real_escape_string($db, $_POST['id']);
			$updateStickerStatus = $iN->iN_UpdateStickerStatus($userID, $iN->iN_Secure($mod), $iN->iN_Secure($langID));
			if ($updateStickerStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update Payment Settings*/
	if ($type == 'paymentSettings') {
		if (isset($_POST['default_currency']) && isset($_POST['fee_comission']) && isset($_POST['min_sub_weekly']) && isset($_POST['min_sub_monthly']) && isset($_POST['min_sub_yearly']) && isset($_POST['min_point_amount']) && isset($_POST['max_point_amount']) && isset($_POST['point_to_dolar']) && isset($_POST['min_withdrawl_amount'])) {
			$defaultCurrency = mysqli_real_escape_string($db, $_POST['default_currency']);
			$comissionFee = mysqli_real_escape_string($db, $_POST['fee_comission']);
			$minimumSubscriptionAmountWeekly = mysqli_real_escape_string($db, $_POST['min_sub_weekly']);
			$minimumSubscriptionAmountMonthly = mysqli_real_escape_string($db, $_POST['min_sub_monthly']);
			$minimumSubscriptionAmountYearly = mysqli_real_escape_string($db, $_POST['min_sub_yearly']);
			$minimumPointAmount = mysqli_real_escape_string($db, $_POST['min_point_amount']);
			$maximumPointAmount = mysqli_real_escape_string($db, $_POST['max_point_amount']);
			$pointToMoney = mysqli_real_escape_string($db, $_POST['point_to_dolar']);
			$minWihDrawlAmount = mysqli_real_escape_string($db, $_POST['min_withdrawl_amount']);
			if (empty($minimumSubscriptionAmountMonthly) || empty($minimumSubscriptionAmountWeekly) || empty($minimumSubscriptionAmountYearly) || empty($minimumPointAmount) || empty($maximumPointAmount) || empty($pointToMoney) || empty($minWihDrawlAmount)) {
				exit('1');
			}
			$updatePaymentSettings = $iN->iN_UpdatePaymentSettings($userID, $iN->iN_Secure($defaultCurrency), $iN->iN_Secure($comissionFee), $iN->iN_Secure($minimumSubscriptionAmountWeekly), $iN->iN_Secure($minimumSubscriptionAmountMonthly), $iN->iN_Secure($minimumSubscriptionAmountYearly), $iN->iN_Secure($minimumPointAmount), $iN->iN_Secure($maximumPointAmount), $iN->iN_Secure($pointToMoney), $iN->iN_Secure($minWihDrawlAmount));
			if ($updatePaymentSettings) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update PayPal Mode Status*/
	if ($type == 'sendboxmode') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updatePayPalSendBoxMode = $iN->iN_UpdatePayPalSendBoxMode($userID, $iN->iN_Secure($mod));
			if ($updatePayPalSendBoxMode) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update PayPal Status*/
	if ($type == 'paypal_status') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updatePayPalStatus = $iN->iN_UpdatePayPalStatus($userID, $iN->iN_Secure($mod));
			if ($updatePayPalStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update PayPal Business And Sandbox Email Address*/
	if ($type == 'updatePaypal') {
		if (isset($_POST['sndbox_email']) && isset($_POST['product_email']) && isset($_POST['paypal_currency'])) {
			$sandBoxEmail = mysqli_real_escape_string($db, $_POST['sndbox_email']);
			$paypalProductEmail = mysqli_real_escape_string($db, $_POST['product_email']);
			$paypalCurrency = mysqli_real_escape_string($db, $_POST['paypal_currency']);
			$updatePayPalDetails = $iN->iN_UpdatePayPalDetails($userID, $iN->iN_Secure($sandBoxEmail), $iN->iN_Secure($paypalProductEmail), $iN->iN_Secure($paypalCurrency));
			if ($updatePayPalDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update BitPay Mode Status*/
	if ($type == 'bitpay_mode') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateBitPaySendBoxMode = $iN->iN_UpdateBitPaySendBoxMode($userID, $iN->iN_Secure($mod));
			if ($updateBitPaySendBoxMode) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update BitPay Status*/
	if ($type == 'bitpay_status') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateBitPayStatus = $iN->iN_UpdateBitPayStatus($userID, $iN->iN_Secure($mod));
			if ($updateBitPayStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update BitPay Business And Sandbox Email Address*/
	if ($type == 'updateBitPay') {
		if (isset($_POST['notification_email']) && isset($_POST['bit_password']) && isset($_POST['pairinccode']) && isset($_POST['bitLabel']) && isset($_POST['bitpay_currency'])) {
			$bitNotificationEmail = mysqli_real_escape_string($db, $_POST['notification_email']);
			$bitPassword = mysqli_real_escape_string($db, $_POST['bit_password']);
			$bitPairingCode = mysqli_real_escape_string($db, $_POST['pairinccode']);
			$bitLabel = mysqli_real_escape_string($db, $_POST['bitLabel']);
			$bitCurrency = mysqli_real_escape_string($db, $_POST['bitpay_currency']);
			$updateBitPayDetails = $iN->iN_UpdateBitPayDetails($userID, $iN->iN_Secure($bitNotificationEmail), $iN->iN_Secure($bitPassword), $iN->iN_Secure($bitPairingCode), $iN->iN_Secure($bitLabel), $iN->iN_Secure($bitCurrency));
			if ($updateBitPayDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update Stripe Mode Status*/
	if ($type == 'stripe_mode') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateStripeSendBoxMode = $iN->iN_UpdateStripeSendBoxMode($userID, $iN->iN_Secure($mod));
			if ($updateStripeSendBoxMode) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update Stripe Status*/
	if ($type == 'stripe_status') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateStripeStatus = $iN->iN_UpdateStripeStatus($userID, $iN->iN_Secure($mod));
			if ($updateStripeStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update StripeDetails */
	if ($type == 'updateStripe') {
		if (isset($_POST['testSecretKey']) && isset($_POST['testPublicKey']) && isset($_POST['liveSecretKey']) && isset($_POST['livePublicKey']) && isset($_POST['stripe_currency'])) {
			$stTestSecretKey = mysqli_real_escape_string($db, $_POST['testSecretKey']);
			$stTestPublicKey = mysqli_real_escape_string($db, $_POST['testPublicKey']);
			$stLiveSecretKey = mysqli_real_escape_string($db, $_POST['liveSecretKey']);
			$stLivePublicKey = mysqli_real_escape_string($db, $_POST['livePublicKey']);
			$stCurrency = mysqli_real_escape_string($db, $_POST['stripe_currency']);
			$updateStripeDetails = $iN->iN_UpdateStripeDetails($userID, $iN->iN_Secure($stTestSecretKey), $iN->iN_Secure($stTestPublicKey), $iN->iN_Secure($stLiveSecretKey), $iN->iN_Secure($stLivePublicKey), $iN->iN_Secure($stCurrency));
			if ($updateStripeDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update authorizenet Mode Status*/
	if ($type == 'authorize_mode') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateAuthorizeNetSendBoxMode = $iN->iN_UpdateAuthorizeNetSendBoxMode($userID, $iN->iN_Secure($mod));
			if ($updateAuthorizeNetSendBoxMode) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update authorizenet Status*/
	if ($type == 'authorizenet_status') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateAuthorizeNetStatus = $iN->iN_UpdateAuthorizeNetStatus($userID, $iN->iN_Secure($mod));
			if ($updateAuthorizeNetStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update AuthorizeNet*/
	if ($type == 'updateAuthorizeNet') {
		if (isset($_POST['testAppID']) && isset($_POST['testTransactionKEY']) && isset($_POST['liveAppID']) && isset($_POST['liveTransactionKEY']) && isset($_POST['authorizenet_currency'])) {
			$autTestAppID = mysqli_real_escape_string($db, $_POST['testAppID']);
			$autTestTransactionKey = mysqli_real_escape_string($db, $_POST['testTransactionKEY']);
			$autLiveAppID = mysqli_real_escape_string($db, $_POST['liveAppID']);
			$autLiveTransactionKey = mysqli_real_escape_string($db, $_POST['liveTransactionKEY']);
			$autCurrency = mysqli_real_escape_string($db, $_POST['authorizenet_currency']);

			$updateAuthorizeNetDetails = $iN->iN_UpdateAuthorizeNetDetails($userID, $iN->iN_Secure($autTestAppID), $iN->iN_Secure($autTestTransactionKey), $iN->iN_Secure($autLiveAppID), $iN->iN_Secure($autLiveTransactionKey), $iN->iN_Secure($autCurrency));
			if ($updateAuthorizeNetDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update IyziCo Mode Status*/
	if ($type == 'iyzico_mode') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateIyziCoSendBoxMode = $iN->iN_UpdateIyziCoSendBoxMode($userID, $iN->iN_Secure($mod));
			if ($updateIyziCoSendBoxMode) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update IyziCo Status*/
	if ($type == 'iyzico_status') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateIyziCoStatus = $iN->iN_UpdateIyziCoStatus($userID, $iN->iN_Secure($mod));
			if ($updateIyziCoStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update IyziCo*/
	if ($type == 'updateIyziCo') {
		if (isset($_POST['iyziTestSecretKey']) && isset($_POST['iyziTestApiKey']) && isset($_POST['iyziLiveApiKey']) && isset($_POST['iyziLiveApiSeckretKey']) && isset($_POST['iyzico_crncy'])) {
			$iyziTestSecretKey = mysqli_real_escape_string($db, $_POST['iyziTestSecretKey']);
			$iyziTestApiKey = mysqli_real_escape_string($db, $_POST['iyziTestApiKey']);
			$iyziLiveApiKey = mysqli_real_escape_string($db, $_POST['iyziLiveApiKey']);
			$iyziLiveApiSeckretKey = mysqli_real_escape_string($db, $_POST['iyziLiveApiSeckretKey']);
			$iyziCurrency = mysqli_real_escape_string($db, $_POST['iyzico_crncy']);
			$updateIyziCoDetails = $iN->iN_UpdateIyziCoDetails($userID, $iN->iN_Secure($iyziTestSecretKey), $iN->iN_Secure($iyziTestApiKey), $iN->iN_Secure($iyziLiveApiKey), $iN->iN_Secure($iyziLiveApiSeckretKey), $iN->iN_Secure($iyziCurrency));
			if ($updateIyziCoDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update RazorPay Mode Status*/
	if ($type == 'razorpay_mode') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateRazorPaySendBoxMode = $iN->iN_UpdateRazorPaySendBoxMode($userID, $iN->iN_Secure($mod));
			if ($updateRazorPaySendBoxMode) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update RazorPay Status*/
	if ($type == 'razorpay_status') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateRazorPayStatus = $iN->iN_UpdateRazorPayStatus($userID, $iN->iN_Secure($mod));
			if ($updateRazorPayStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update RazorPay*/
	if ($type == 'updateRazorPay') {
		if (isset($_POST['razorTestKey']) && isset($_POST['razorTestSecret']) && isset($_POST['razorLiveKey']) && isset($_POST['razorLiveSecret']) && isset($_POST['razorpay_crncy'])) {
			$razorTestKey = mysqli_real_escape_string($db, $_POST['razorTestKey']);
			$razorTestSecret = mysqli_real_escape_string($db, $_POST['razorTestSecret']);
			$razorLiveKey = mysqli_real_escape_string($db, $_POST['razorLiveKey']);
			$razorLiveSecret = mysqli_real_escape_string($db, $_POST['razorLiveSecret']);
			$razorCurrency = mysqli_real_escape_string($db, $_POST['razorpay_crncy']);
			$updateRazorPayDetails = $iN->iN_UpdateRazorPayDetails($userID, $iN->iN_Secure($razorTestKey), $iN->iN_Secure($razorTestSecret), $iN->iN_Secure($razorLiveKey), $iN->iN_Secure($razorLiveSecret), $iN->iN_Secure($razorCurrency));
			if ($updateRazorPayDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update PayStack Mode Status*/
	if ($type == 'paystack_mode') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updatePayStackSendBoxMode = $iN->iN_UpdatePayStackSendBoxMode($userID, $iN->iN_Secure($mod));
			if ($updatePayStackSendBoxMode) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update PayStack Status*/
	if ($type == 'paystack_status') {
		if (in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updatePayStackStatus = $iN->iN_UpdatePayStackStatus($userID, $iN->iN_Secure($mod));
			if ($updatePayStackStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update PayStack*/
	if ($type == 'updatePayStack') {
		if (isset($_POST['paystackTestSecret']) && isset($_POST['paystackTestPublic']) && isset($_POST['paystackLiveSecretKey']) && isset($_POST['paystackLivePublicKey']) && isset($_POST['paystack_crncy'])) {
			$payStackTestSecret = mysqli_real_escape_string($db, $_POST['paystackTestSecret']);
			$payStackTestPublic = mysqli_real_escape_string($db, $_POST['paystackTestPublic']);
			$payStackLiveSecret = mysqli_real_escape_string($db, $_POST['paystackLiveSecretKey']);
			$payStackLivePublic = mysqli_real_escape_string($db, $_POST['paystackLivePublicKey']);
			$payStackCurrency = mysqli_real_escape_string($db, $_POST['paystack_crncy']);
			$updatePayStackDetails = $iN->iN_UpdatePayStackDetails($userID, $iN->iN_Secure($payStackTestSecret), $iN->iN_Secure($payStackTestPublic), $iN->iN_Secure($payStackLiveSecret), $iN->iN_Secure($payStackLivePublic), $iN->iN_Secure($payStackCurrency));
			if ($updatePayStackDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Setting social Login Status*/
	if ($type == 'sLoginSet') {
		$GoogleCliendID = mysqli_real_escape_string($db, $_POST['google_cliend_id']);
		$TwitterCliendID = mysqli_real_escape_string($db, $_POST['twitter_cliend_id']);
		$GoogleIcon = mysqli_real_escape_string($db, $_POST['google_icon']);
		$TwitterIcon = mysqli_real_escape_string($db, $_POST['twitter_icon']);
		$GoogleCliendSecret = mysqli_real_escape_string($db, $_POST['google_cliend_secret']);
		$TwitterCliendSecret = mysqli_real_escape_string($db, $_POST['twitter_cliend_secret']);
		$GoogleSocialLoginStatus = mysqli_real_escape_string($db, $_POST['google_status']);
		$TwitterSocialLoginStatus = mysqli_real_escape_string($db, $_POST['twitter_status']);

		if ($GoogleSocialLoginStatus == '1') {
			if (empty($GoogleCliendID) || empty($GoogleCliendSecret)) {
				exit($LANG['fill_all_google_requirements']);
			}
		}
		if ($TwitterSocialLoginStatus == '1') {
			if (empty($TwitterCliendID) || empty($TwitterCliendSecret)) {
				exit($LANG['fill_all_twitter_requirements']);
			}
		}
		$UpdateSocialLoginDetails = $iN->iN_UpdateSocialLoginDetails($userID, $iN->iN_Secure($GoogleCliendID), $iN->iN_Secure($TwitterCliendID), $iN->iN_Secure($GoogleIcon), $iN->iN_Secure($TwitterIcon), $iN->iN_Secure($GoogleCliendSecret), $iN->iN_Secure($TwitterCliendSecret), $iN->iN_Secure($GoogleSocialLoginStatus), $iN->iN_Secure($TwitterSocialLoginStatus));
		if ($UpdateSocialLoginDetails) {
			exit('200');
		} else {
			echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
		}
	}
/*Mark As Paid*/
	if ($type == 'paid') {
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$paymentID = mysqli_real_escape_string($db, $_POST['id']);
			$updatePayoutStatus = $iN->iN_UpdatePayoutStatus($userID, $paymentID);
			if ($updatePayoutStatus) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
/*Yes Decline Payment Request*/
	if ($type == 'yesDecline') {
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$declinedID = mysqli_real_escape_string($db, $_POST['id']);
			$checkPaymentRequestID = $iN->iN_CheckPaymentRequestIDExist($userID, $declinedID);
			if ($checkPaymentRequestID) {
				$okDecline = $iN->iN_DeclineRequest($userID, $iN->iN_Secure($declinedID));
				if ($okDecline) {
					exit('200');
				} else {
					echo '404';
				}
			} else {
				exit($LANG['payment_request_no_longer_available']);
			}
		}
	}
/*Yes Delete Payout From Data*/
	if ($type == 'deletePayoutt') {
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$deleteID = mysqli_real_escape_string($db, $_POST['id']);
			$checkPaymentRequestID = $iN->iN_CheckPaymentRequestIDExist($userID, $deleteID);
			if ($checkPaymentRequestID) {
				$okDelete = $iN->iN_DeletePayoutRequest($userID, $iN->iN_Secure($deleteID));
				if ($okDelete) {
					exit('200');
				} else {
					echo '404';
				}
			} else {
				exit($LANG['payment_request_no_longer_available']);
			}
		}
	}
	if ($type == 'adsFile') {
		//$availableFileExtensions
		if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
			$theValidateType = mysqli_real_escape_string($db, $_POST['c']);
			foreach ($_FILES['uploading']['name'] as $iname => $value) {
				$name = stripslashes($_FILES['uploading']['name'][$iname]);
				$size = $_FILES['uploading']['size'][$iname];
				$ext = getExtension($name);
				$ext = strtolower($ext);
				$valid_formats = explode(',', $availableVerificationFileExtensions);
				if (in_array($ext, $valid_formats)) {
					if (convert_to_mb($size) < $availableUploadFileSize) {
						$microtime = microtime();
						$removeMicrotime = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime);
						$UploadedFileName = "image_" . $removeMicrotime . '_' . $userID;
						$getFilename = $UploadedFileName . "." . $ext;
						// Change the image ame
						$tmp = $_FILES['uploading']['tmp_name'][$iname];
						$mimeType = $_FILES['uploading']['type'][$iname];
						$d = date('Y-m-d');
						if (preg_match('/video\/*/', $mimeType)) {
							$fileTypeIs = 'video';
						} else if (preg_match('/image\/*/', $mimeType)) {
							$fileTypeIs = 'Image';
						}
						if (!file_exists($uploadAdsImage . $d)) {
							$newFile = mkdir($uploadAdsImage . $d, 0755);
						}
						if (!file_exists($xImages . $d)) {
							$newFile = mkdir($xImages . $d, 0755);
						}
						if (move_uploaded_file($tmp, $uploadAdsImage . $d . '/' . $getFilename)) {
							/*IF FILE FORMAT IS VIDEO THEN DO FOLLOW*/
							if ($fileTypeIs == 'Image') {
								$pathFile = 'uploads/spImages/' . $d . '/' . $getFilename;
								$UploadSourceUrl = $base_url . 'uploads/spImages/' . $d . '/' . $getFilename;
							}
							echo $UploadSourceUrl;
						}
					} else {
						echo filter_var($size, FILTER_SANITIZE_STRING);
					}
				}
			}
		}
	}
/*Insert New Ads*/
	if ($type == 'adsDForm') {
		if (isset($_POST['adsFile']) && isset($_POST['ads_title']) && isset($_POST['ads_description']) && isset($_POST['ads_url'])) {
			$adsImage = mysqli_real_escape_string($db, $_POST['adsFile']);
			$adsTitle = mysqli_real_escape_string($db, $_POST['ads_title']);
			$adsDescription = mysqli_real_escape_string($db, $_POST['ads_description']);
			$adsRedirectUrl = mysqli_real_escape_string($db, $_POST['ads_url']);
			if (empty($adsImage)) {
				exit('3');
			}
			if (filter_var($adsRedirectUrl, FILTER_VALIDATE_URL) === FALSE) {
				exit('2');
			}
			if (empty($adsTitle)) {
				exit('4');
			}
			if (!empty($adsImage) && !empty($adsTitle) && !empty($adsRedirectUrl)) {
				$insertNewAds = $iN->iN_InsertNewAdvertisement($userID, $iN->iN_Secure($adsImage), $iN->iN_Secure($adsTitle), $iN->iN_Secure($adsDescription), $iN->iN_Secure($adsRedirectUrl));
				if ($insertNewAds) {
					exit('200');
				} else {
					echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
				}
			} else {
				exit('1');
			}
		}
	}
/*Change Ads Status*/
	if ($type == 'adsStatus') {
		if (isset($_POST['id']) && in_array(isset($_POST['mod']), $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$adsID = mysqli_real_escape_string($db, $_POST['id']);
			$updateAdsStatus = $iN->iN_UpdateAdsStatus($userID, $iN->iN_Secure($mod), $iN->iN_Secure($adsID));
			if ($updateAdsStatus) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
/*Insert New Ads*/
	if ($type == 'adsUForm') {
		if (isset($_POST['adsFile']) && isset($_POST['ads_title']) && isset($_POST['ads_description']) && isset($_POST['ads_url']) && isset($_POST['adsi'])) {
			$adsImage = mysqli_real_escape_string($db, $_POST['adsFile']);
			$adsTitle = mysqli_real_escape_string($db, $_POST['ads_title']);
			$adsDescription = mysqli_real_escape_string($db, $_POST['ads_description']);
			$adsRedirectUrl = mysqli_real_escape_string($db, $_POST['ads_url']);
			$editingAdsID = mysqli_real_escape_string($db, $_POST['adsi']);
			if (empty($adsImage)) {
				exit('3');
			}
			if (filter_var($adsRedirectUrl, FILTER_VALIDATE_URL) === FALSE) {
				exit('2');
			}
			if (empty($adsTitle)) {
				exit('4');
			}
			if (!empty($adsImage) && !empty($adsTitle) && !empty($adsDescription) && !empty($adsRedirectUrl) && trim($adsTitle) != '' && trim($adsDescription) != '') {
				$insertNewAds = $iN->iN_UpdateAdvertisement($userID, $iN->iN_Secure($editingAdsID), $iN->iN_Secure($adsImage), $iN->iN_Secure($adsTitle), $iN->iN_Secure($adsDescription), $iN->iN_Secure($adsRedirectUrl));
				if ($insertNewAds) {
					exit('200');
				} else {
					echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
				}
			} else {
				exit('1');
			}
		}
	}
/*Delete Ads*/
	if ($type == 'deleteThisAds') {
		if (isset($_POST['id'])) {
			$adID = mysqli_real_escape_string($db, $_POST['id']);
			$deleteAds = $iN->iN_DeleteAdsFromData($userID, $iN->iN_Secure($adID));
			if ($deleteAds) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
/*Update Stripe Subscriptoion Status*/
	if ($type == 'stripe_sub_status') {
		if (in_array(isset($_POST['mod']), $statusSubOneTwo)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateStripeStatus = $iN->iN_UpdateStripeSubStatus($userID, $iN->iN_Secure($mod));
			if ($updateStripeStatus) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update Subscription StripeDetails */
	if ($type == 'updateSubStripe') {
		if (isset($_POST['subSecretKey']) && isset($_POST['subPublicKey']) && isset($_POST['stripe_currency'])) {
			$stSubSecretKey = mysqli_real_escape_string($db, $_POST['subSecretKey']);
			$stSubPublicKey = mysqli_real_escape_string($db, $_POST['subPublicKey']);
			$stSubCurrency = mysqli_real_escape_string($db, $_POST['stripe_currency']);
			$updateStripeDetails = $iN->iN_UpdateSubStripeDetails($userID, $iN->iN_Secure($stSubSecretKey), $iN->iN_Secure($stSubPublicKey), $iN->iN_Secure($stSubCurrency));
			if ($updateStripeDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
/*Update Giphy Api Key*/
	if ($type == 'updateGiphy') {
		if (isset($_POST['giphyKey']) && !empty($_POST['giphyKey'])) {
			$giphyKey = mysqli_real_escape_string($db, $_POST['giphyKey']);
			$updateGiphyKey = $iN->iN_UpdateGiphyAPIKey($userID, $iN->iN_Secure($giphyKey));
			if ($updateGiphyKey) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		} else {
			exit($LANG['enter_valid_giphy_key']);
		}
	}
	/*Email Settings*/
	if ($type == 'updateLiveSettings') {
		$liveStatus = mysqli_real_escape_string($db, $_POST['s3Status']);
		$freeLiveLimit = mysqli_real_escape_string($db, $_POST['post_show_limit']);
		$agora_AppID = mysqli_real_escape_string($db, $_POST['appID']);
		$agora_Certificate = mysqli_real_escape_string($db, $_POST['appCertificate']);
		$agora_CustomerID = mysqli_real_escape_string($db, $_POST['appCustomerID']);
		$liveMinimumFee = mysqli_real_escape_string($db, $_POST['liveMinPrice']);
		if ($liveStatus == '1') {
			if (empty($freeLiveLimit) || empty($agora_AppID) || empty($agora_Certificate) || empty($agora_CustomerID)) {
				exit($LANG['all_information_need_filled']);
			}
		}
		$updateLiveSettings = $iN->iN_UpdateAgoraLiveStreamingSettings($userID, $iN->iN_Secure($liveStatus), $iN->iN_Secure($freeLiveLimit), $iN->iN_Secure($agora_AppID), $iN->iN_Secure($agora_Certificate), $iN->iN_Secure($agora_CustomerID), $iN->iN_Secure($liveMinimumFee));
		if ($updateLiveSettings) {
			exit('200');
		} else {
			echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
		}
	}
	/*Update Page*/
	if ($type == 'updateMainPage') {
		if (isset($_POST['tm']) && !empty($_POST['tm'])) {
			$theme = mysqli_real_escape_string($db, $_POST['tm']);
			$updateTheme = $iN->iN_UpdateTheme($userID, $iN->iN_Secure($theme));
			if ($updateTheme) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
	/*Update Landing Page Images*/
	if ($type == 'imageOne' || $type == 'imageTwo' || $type == 'imageThree' || $type == 'imageFour' || $type == 'imageFive' || $type == 'imageSix' || $type == 'imageSeventh' || $type == 'imageBg' || $type == 'imageFrnt') {
		//$availableFileExtensions
		if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
			$theValidateType = mysqli_real_escape_string($db, $_POST['c']);
			$fileReq = isset($_FILES['uploading']['name']) ? $_FILES['uploading']['name'] : NULL;
			foreach ($fileReq as $iname => $value) {
				$name = stripslashes($_FILES['uploading']['name'][$iname]);
				$size = $_FILES['uploading']['size'][$iname];
				$ext = getExtension($name);
				$ext = strtolower($ext);
				$valid_formats = explode(',', $availableVerificationFileExtensions);
				if (in_array($ext, $valid_formats)) {
					if (convert_to_mb($size) < $availableUploadFileSize) {
						$microtime = microtime();
						$removeMicrotime = preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', $microtime);
						$UploadedFileName = "image_" . $removeMicrotime . '_' . $userID;
						$getFilename = $UploadedFileName . "." . $ext;
						// Change the image ame
						$tmp = $_FILES['uploading']['tmp_name'][$iname];
						$mimeType = $_FILES['uploading']['type'][$iname];
						$d = date('Y-m-d');
						if (preg_match('/video\/*/', $mimeType)) {
							$fileTypeIs = 'video';
						} else if (preg_match('/image\/*/', $mimeType)) {
							$fileTypeIs = 'Image';
						}
						if (!file_exists($uploadIconLogo . 'landingImages/' . $d)) {
							$newFile = mkdir($uploadIconLogo . 'landingImages/' . $d, 0755);
						}
						if (move_uploaded_file($tmp, $uploadIconLogo . 'landingImages/' . $d . '/' . $getFilename)) {
							/*IF FILE FORMAT IS VIDEO THEN DO FOLLOW*/
							if ($fileTypeIs == 'Image') {
								$pathFile = 'img/landingImages/' . $d . '/' . $getFilename;
								$UploadSourceUrl = $base_url . 'img/landingImages/' . $d . '/' . $getFilename;
								if ($type == 'imageOne') {
									$iN->iN_UpdateFirstLandingPageImage($userID, $pathFile);
								} else if ($type == 'imageTwo') {
									$iN->iN_UpdateSecondLandingPageImage($userID, $pathFile);
								} else if ($type == 'imageThree') {
									$iN->iN_UpdateThirdLandingPageImage($userID, $pathFile);
								} else if ($type == 'imageFour') {
									$iN->iN_UpdateFourthLandingPageImage($userID, $pathFile);
								} else if ($type == 'imageFive') {
									$iN->iN_UpdateFifthLandingPageImage($userID, $pathFile);
								} else if ($type == 'imageSix') {
									$iN->iN_UpdateSixthLandingPageImage($userID, $pathFile);
								} else if ($type == 'imageSeventh') {
									$iN->iN_UpdateSeventhLandingPageImage($userID, $pathFile);
								} else if ($type == 'imageBg') {
									$iN->iN_UpdateBgLandingPageImage($userID, $pathFile);
								} else if ($type == 'imageFrnt') {
									$iN->iN_UpdateFrntLandingPageImage($userID, $pathFile);
								}
							}
							echo 'img/landingImages/' . $d . '/' . $getFilename;
						}
					} else {
						echo filter_var($size, FILTER_SANITIZE_STRING);
					}
				}
			}
		}
	}
	/*Save New Question Answer*/
	if ($type == 'newQA') {
		if (isset($_POST['newq']) && isset($_POST['newqa'])) {
			$newQusetion = mysqli_real_escape_string($db, $_POST['newq']);
			$newQusetionAnswer = mysqli_real_escape_string($db, $_POST['newqa']);
			if (empty($newQusetion) || empty($newQusetionAnswer)) {
				exit('2');
			}
			$insertNewQuestionAnsser = $iN->iN_InsertNewQuestionAnswer($userID, $iN->iN_Secure($newQusetionAnswer), $iN->iN_Secure($newQusetion));
			if ($insertNewQuestionAnsser) {
				exit('200');
			} else {
				exit($LANG['save_failed']);
			}
		} else {
			exit('2');
		}
	}
	/*Save New Question Answer*/
	if ($type == 'edQA') {
		if (isset($_POST['newq']) && isset($_POST['newqa']) && isset($_POST['qid'])) {
			$newQusetion = mysqli_real_escape_string($db, $_POST['newq']);
			$newQusetionAnswer = mysqli_real_escape_string($db, $_POST['newqa']);
			$QAID = mysqli_real_escape_string($db, $_POST['qid']);
			if (empty($newQusetion) || empty($newQusetionAnswer) || empty($QAID)) {
				exit('2');
			}
			$updateQuestionAnswer = $iN->iN_UpdateLandingQA($userID, $iN->iN_Secure($newQusetionAnswer), $iN->iN_Secure($newQusetion), $iN->iN_Secure($QAID));
			if ($updateQuestionAnswer) {
				exit('200');
			} else {
				exit($LANG['save_failed']);
			}
		} else {
			exit('2');
		}
	}
	/*Update CCBILL Details */
	if ($type == 'updateSubStripeCCBILL') {
		if (isset($_POST['accountNumber']) && isset($_POST['subAccountNumber']) && isset($_POST['flexFormID']) && isset($_POST['saltKey']) && isset($_POST['ccbill_currency'])) {
			$accountNumber = mysqli_real_escape_string($db, $_POST['accountNumber']);
			$subAccountNumber = mysqli_real_escape_string($db, $_POST['subAccountNumber']);
			$flexFormID = mysqli_real_escape_string($db, $_POST['flexFormID']);
			$saltKey = mysqli_real_escape_string($db, $_POST['saltKey']);
			$ccbillCurrency = mysqli_real_escape_string($db, $_POST['ccbill_currency']);
			$updateCCBILLDetails = $iN->iN_UpdateSubCCBILLDetails($userID, $iN->iN_Secure($accountNumber), $iN->iN_Secure($subAccountNumber), $iN->iN_Secure($flexFormID), $iN->iN_Secure($saltKey), $iN->iN_Secure($ccbillCurrency));
			if ($updateCCBILLDetails) {
				exit('200');
			} else {
				echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);
			}
		}
	}
	/*Update DigitalOceal Storage Details*/
	if ($type == 'DigitalOceanSettings') {
		$dOceanRegion = mysqli_real_escape_string($db, $_POST['oceanregion']);
		$dOgeanBucket = mysqli_real_escape_string($db, $_POST['docean_ducket']);
		$dOceanKey = mysqli_real_escape_string($db, $_POST['docean_key']);
		$dOceanSecretKey = mysqli_real_escape_string($db, $_POST['oceansecret_key']);
		$dOceanStatus = mysqli_real_escape_string($db, $_POST['s3Status']);
		$updateDigitalOceanSettings = $iN->iN_UpdateDigitalOceanDetails($userID, $iN->iN_Secure($dOceanRegion), $iN->iN_Secure($dOgeanBucket), $iN->iN_Secure($dOceanKey), $iN->iN_Secure($dOceanSecretKey), $iN->iN_Secure($dOceanStatus));
		if ($updateDigitalOceanSettings) {
			exit('200');
		} else {
			echo '404';
		}
	}
	/*ffmpeg status*/ 
	if ($type == 'ffmpegMode') {
		if (in_array($_POST['mod'], $statusValue)) {
			$mod = mysqli_real_escape_string($db, $_POST['mod']);
			$updateffmpegSendStatus = $iN->iN_UpdateFFMPEGSendStatus($userID, $iN->iN_Secure($mod));
			if ($updateffmpegSendStatus) {
				exit('200');
			} else {
				echo '404';
			}
		}
	}
} else {
	echo 'This is test account you can not change anything because admin features disabled for test admin user.';
}
?> 